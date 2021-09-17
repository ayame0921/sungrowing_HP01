<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered mb-5">
            <thead>
                <tr class="table-primary">
                    <th>商品名</th>
                    <th>個数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Queen Pepper Spray 護身用品 トウガラシスプレー クイーン コンパクトサイズ 高級デザイン 女性用 最高の防犯アイテム 家庭用 ジョ</td>
                    <td>1</td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <?= $this->Form->create($orders, ['align' => 'horizontal']) ?>
            <div class="form-group row border-bottom">
                <label class="col-md-1">注文番号</label>
                <div class="col-md-10">
                    <span id="orderNum"></span>
                    <i class="far fa-copy ml-2 copy-txt" data-copy-target="orderNum" data-toggle="tooltip" data-placement="top" title="注文番号をコピー" style="cursor: pointer;"></i>
                </div>
            </div>
            <div class="form-group row border-bottom pb-3">
                <label class="col-md-1 col-form-label">仕入れ</label>
                <div class="col-md-10">
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">価格</div>
                        <div class="col-md-auto"><?= $this->Form->text('cost', ['type' => 'text', 'class' => 'form-control']) ?></div>
                        <div class="col-form-label col-md-auto">円</div>
                    </div>
                    <div class="row">
                        <div class="col-form-label col-md-1">Amazon pt</div>
                        <div class="col-md-auto"><?= $this->Form->text('cost_amazon_pt', ['type' => 'text', 'class' => 'form-control']) ?></div>
                        <div class="col-form-label col-md-auto">pt</div>
                    </div>
                </div>
            </div>
            <div class="form-group row border-bottom pb-3">
                <label class="col-md-1 col-form-label">配送先</label>
                <div class="col-md-10">
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">郵便番号</div>
                        <div class="col-md-1"><?= $this->Form->text('zip_code1', ['type' => 'text', 'class' => 'form-control']) ?></div>
                        <div class="col-form-label col-md-auto">ー</div>
                        <div class="col-md-1"><?= $this->Form->text('zip_code2', ['type' => 'text', 'class' => 'form-control']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">都道府県</div>
                        <div class="col-md-auto"><?= $this->Form->select('prefecture', $prefecturetList, ['class' => 'form-control']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">市区町村</div>
                        <div class="col-md-8"><?= $this->Form->text('city', ['type' => 'text', 'class' => 'form-control']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">住所</div>
                        <div class="col-md-8"><?= $this->Form->text('sub_address', ['type' => 'text', 'class' => 'form-control']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">氏名</div>
                        <div class="col-md-2"><?= $this->Form->text('family_name', ['type' => 'text', 'class' => 'form-control']) ?></div>
                        <div class="col-md-2"><?= $this->Form->text('first_name', ['type' => 'text', 'class' => 'form-control']) ?></div>
                    </div>
                    <div class="row">
                        <div class="col-form-label col-md-1">電話番号</div>
                        <div class="col-md-1"><?= $this->Form->text('phone_number1', ['type' => 'text', 'class' => 'form-control']) ?></div>
                        <div class="col-md-1"><?= $this->Form->text('phone_number2', ['type' => 'text', 'class' => 'form-control']) ?></div>
                        <div class="col-md-1"><?= $this->Form->text('phone_number3', ['type' => 'text', 'class' => 'form-control']) ?></div>
                    </div>
                </div>
            </div>
            <div class="form-group row border-bottom pb-3">
                <label class="col-md-1 col-form-label">出荷情報</label>
                <div class="col-md-10">
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">配送会社</div>
                        <div class="col-md-auto"><?= $this->Form->select('delivery_company', $deliveryCompanyList, ['empty' => '未指定', 'class' => 'form-control']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">伝票番号</div>
                        <div class="col-md-2"><?= $this->Form->text('shipping_number', ['type' => 'text', 'class' => 'form-control']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-form-label col-md-1">出荷日時</div>
                        <div class="col-md-2"><?= $this->Form->text('shipping_datetime', ['type' => 'text', 'class' => 'form-control datetimepicker']) ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?= $this->Form->button('閉じる', ['type' => 'button', 'class' => 'btn btn-secondary', 'id' => 'closeWindow']) ?>
                    <?= $this->Form->button('編集', ['type' => 'submit', 'class' => 'btn btn-primary float-right']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<!-- /.card -->

<?php // <script>タグ不要だが、エディタの色分けだけのために記載 ?>
<script type="text/javascript">
<?= $this->Html->scriptStart(['block' => true]); ?>
$(function() {
    // タブ閉じる
    $('#closeWindow').on('click', function() {
        window.close();
    });

    // ツールチップ
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'manual'
    });
    $('.copy-txt').hover(function(){
        $(this).attr('data-original-title', '注文番号をコピー')
               .tooltip('show');
    }, function(){
        $(this).tooltip('hide');
    });
    $('.copy-txt').click(function(){
        $(this).attr('data-original-title', 'コピーしました')
               .tooltip('show');
    });
});
<?= $this->Html->scriptEnd(); ?>
</script>