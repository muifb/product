<div class="container">
    <h1 class="mt-4">Abaut Me</h1>
    <div class="row mb-2">
        <div class="col-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path>
            </svg>
        </div>
        <div class="col">
            <p class="document-desc"><?= $data['about']['name']; ?></p>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path>
            </svg>
        </div>
        <div class="col">
            <p class="document-desc"><?= $data['about']['email']; ?></p>
        </div>
    </div>
</div>