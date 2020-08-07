<?php
require_once "ParentControllerAdmin.php";


use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Transaction extends ParentControllerAdmin
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("TransactionModel");
    }

    function index()
    {
        $this->load->view('_part/header');
        $this->load->view('transaction/transactionView');
        $this->load->view('transaction/transactionForm');
        $this->load->view('_part/footer');
    }
    function show($detail = null, $id = null)
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($detail)) {
            if (empty($id)) {
                $responseDto->setStatus(400);
                $responseDto->setSuccess(false);
                $this->responseBuilder($responseDto);
            }
            $responseDto->setContent($this->TransactionModel->getDetailTransactionById($id));
            $responseDto->setSuccess(true);
            $this->responseBuilder($responseDto);
        } else {
            $responseDto->setSuccess(true);
            $responseDto->setContent($this->TransactionModel->getListTransaction());
            $this->responseBuilder($responseDto);
        }
    }
    function history($customer = null)
    {
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (isset($customer)) {
            $responseDto->setContent($this->TransactionModel->getListTransaction($customer));
            $responseDto->setSuccess(true);
            $this->responseBuilder($responseDto);
        } else {
            $responseDto->setStatus(400);
            $responseDto->setSuccess(false);
            $this->responseBuilder($responseDto);
        }
    }
    function save()
    {
        $req =  $this->requestBuilder();
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (isset($req['customerId']) && isset($req['packageId']) && isset($req['qty']) && isset($req['total']) && isset($_SESSION['username'])) {
            $param = $this->postToDto($req);
            $res = $this->TransactionModel->saveTransaction($param);
            if ($res == null) {
                $responseDto->setSuccess(false);
                $responseDto->setStatus(500);
            } else {
                $responseDto->setSuccess(true);
                $responseDto->setStatus(200);
                $responseDto->setContent($res);
            }
            $this->responseBuilder($responseDto);
        }
    }

    function update($status = null)
    {
        $req =  $this->requestBuilder();
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (empty($req['orderId'])) {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(400);
            $this->responseBuilder($responseDto);
        } else {
            if (isset($status)) {
                if (isset($req['statusCode'])) {
                    $responseDto->setSuccess(true);
                    $responseDto->setContent($this->TransactionModel->updateStatusTransaction($req['orderId'], $req['statusCode']));
                } else {
                    $responseDto->setSuccess(false);
                    $responseDto->setStatus(400);
                }
            } else {

                $dto =  $this->postToDto($req);
                $res = $this->TransactionModel->updateTransaction($dto);
                if ($res == null) {
                    $responseDto->setSuccess(false);
                    $responseDto->setStatus(500);
                } else {
                    $responseDto->setSuccess(true);
                    $responseDto->setStatus(200);
                    $responseDto->setContent($res);
                }
            }
        }
        $this->responseBuilder($responseDto);
    }
    function delete()
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($_POST['orderId'])) {
            $responseDto->setSuccess($this->TransactionModel->deleteTransactionById($_POST['orderId']));
        } else {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(400);
        }
        $this->responseBuilder($responseDto);
    }

    private function responseBuilder($responseDto)
    {
        $status = $responseDto->getStatus() == null ? 200 : $responseDto->getStatus();
        $responseDto->setStatus($status);
        $this->output
            ->set_status_header($status)
            ->set_output(json_encode($responseDto));
    }

    function postToDto($req)
    {
        $param = new $this->TransactionModel();
        if (isset($req['orderId'])) {
            $param->setTransactionId($req['orderId']);
        }
        $param->setCustomerId($req['customerId']);
        $param->setPackageId($req['packageId']);
        $param->setQty($req['qty']);
        $param->setTotal($req['total']);
        $param->setKasirId($_SESSION['username']);
        $param->setDelivery($req['delivery']);
        $param->setExtraCost($req['extraCost']);
        return $param;
    }

    public function exportReport()
    {
        if (isset($_POST['exportpdf'])) {
            $this->exportpdf();
        } else {
            $this->exportexcel();
        }
    }
    public function exportpdf()
    {
        $data['listTrans'] = $this->TransactionModel->getListTransaction($_POST['customerId'], $_POST['dateFrom'], $_POST['dateTo']);
        // var_dump($data);
        $this->load->library('pdf');
        // Create new Spreadsheet object
        if (empty($data['listTrans'])) {
            echo "Maaf tidak ada transaksi";
        } else {
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "transaksi " . $data['listTrans'][0]->name . "_" . $_POST['dateFrom'] . "-" . $_POST['dateTo'] . ".pdf";
            $this->pdf->load_view('report/reportPdf', $data);
        }
    }
    public function report()
    {

        $this->load->view('_part/header');
        $this->load->view('report/reportForm');
        $this->load->view('_part/footer');
    }
    public function exportexcel()
    {

        $listTrans = $this->TransactionModel->getListTransaction($_POST['customerId'], $_POST['dateFrom'], $_POST['dateTo']);
        // Create new Spreadsheet object
        if (empty($listTrans)) {
            echo "Maaf tidak ada transaksi";
        } else {
            $spreadsheet = new Spreadsheet();
            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];

            // Set document properties
            $spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
                ->setLastModifiedBy('Andoyo - Java Web Medi')
                ->setTitle('Office 2007 XLSX Test Document')
                ->setSubject('Office 2007 XLSX Test Document')
                ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('Test result file');

            // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Customer')
                ->setCellValue('B1', $listTrans[0]->name)
                ->setCellValue('A2', 'Kasir')
                ->setCellValue('B2', $_SESSION['username'])
                ->setCellValue('A3', 'Tanggal Dibuat')
                ->setCellValue('B3', date('d-m-Y'));
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A5', "Package")
                ->setCellValue('B5', "Qty")
                ->setCellValue('C5', "Tanggal Dibuat")
                ->setCellValue('D5', "Cost Delivery")
                ->setCellValue('E5', "Price")
                ->setCellValue('F5', "Total");

            // Miscellaneous glyphs, UTF-8
            $i = 6;
            $amount = 0;
            foreach ($listTrans as $t) {

                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $t->packageName)
                    ->setCellValue('B' . $i, $t->qty)
                    ->setCellValue('C' . $i, $t->createtm)
                    ->setCellValue('D' . $i, $t->extraCost)
                    ->setCellValue('E' . $i, $t->price)
                    ->setCellValue('F' . $i, $t->total);
                $i++;
                $amount += $t->total;
            }
            $total = $i + 1;
            $spreadsheet->setActiveSheetIndex(0)
                ->mergeCells("A" . $total . ":E" . $total)->setCellValue("A" . $total, "Total")
                ->setCellValue("F" . $total, $amount);

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y H'));

            $spreadsheet->setActiveSheetIndex(0)->getStyle('A5:F' . $total)->applyFromArray($styleArray);
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Xlsx)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }
    }
}
