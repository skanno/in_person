<?= $this->Form->create() ?>
    <main class="container-sm mt-5">
        <div class="row">
            <div class="col-4 text-end">
                <label class="form-label text-white m-2" for="name">メールアドレス</label>
            </div>
            <div class="col-8">
                <?= $this->Form->control('email', [
                    'required' => true,
                    'class' => 'form-control m-2',
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-end">
                <label class="form-label text-white m-2" for="name">パスワード</label>
            </div>
            <div class="col-8">
                <?= $this->Form->control('password', [
                    'type' => 'password',
                    'class' => 'form-control m-2',
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="text-end">
                <div class="col-8 text-white m-2">
                    <input type="checkbox">
                    記憶する
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary m-3">ログイン</button>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8 text-white">
                新規会員登録は<?= $this->Html->link('こちらから', ['controller' => 'persons', 'action' => 'add']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8 text-white">
                パスワードをお忘れの方は<?= $this->Html->link('こちらから', ['controller' => 'persons', 'action' => 'add']) ?>
            </div>
        </div>
    </main>
<?= $this->Form->end() ?>
