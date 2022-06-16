<div class="container" style="margin-bottom: 250px;">
    <?php foreach ($diem_thi as $a) : ?>
    <?php $i = 1;?>
        <div class="box-diem">
            <h6><?=$i;?>: <?= $a->ten_mon_hoc; ?></h3>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên đầu điểm</th>
                            <th>Điểm</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >1</td>
                            <td>Điêm lần 1</td>
                            <td><?= $a->diem_lan_1 ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Điểm lần 2</td>
                            <td><?= $a->diem_lan_2 ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <?php $i+=1?>;
    <?php endforeach; ?>
</div>