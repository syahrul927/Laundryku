<?php

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<table style="width: 100%; ">
    <tr>
        <td style="text-align: center;">
            <h1>LaundryKu</h1>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <h2>
                Perumahan Taman Alamanda Blok A16 No 28 RT 06 RW 11, Telp/Whatsapp : 0895333302590
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <br />
            <br />
            <br />
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td>
                        Customer
                    </td>
                    <td>:</td>
                    <td>
                        <?= $listTrans[0]->name?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Kasir
                    </td>
                    <td>:</td>
                    <td>
                        <?= $_SESSION['username'] ?>
                    </td>               
                </tr>
                <tr>
                    <td>
                        Tanggal dibuat
                    </td>
                    <td>:</td>
                    <td>
                        
                    <?= date("d-m-Y") ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <br>
            <br>
            <br>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%; " border="1px solid" >
                <tr style="text-align: left;">
                    <th>Package</th>
                    <th>Qty</th>
                    <th>Tanggal Dibuat</th>
                    <th>Cost Delivery</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <?php
                $totalAmount = 0;
                foreach ($listTrans as $key => $t) {
                ?>
                    <tr>
                        <td><?= $t->packageName ?></td>
                        <td><?= $t->qty ?></td>
                        <td><?= $t->createtm?></td>
                        <td><?= rupiah($t->extraCost); ?></td>
                        <td><?= rupiah($t->price); ?></td>
                        <td><?= rupiah($t->total); ?></td>
                    </tr>
                <?php
                $totalAmount += $t->total;
                }
                ?>
                <tr>
                    <td colspan="5">Total Keseluruhan</td>
                    <?php
                        echo "<td>".rupiah($totalAmount)."</td>"
                    ?>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <br>
            <br>
            <br>
            <br>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            ~ Terima Kasih ~
        </td>
    </tr>
</table>