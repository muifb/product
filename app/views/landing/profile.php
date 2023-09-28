<div class="main py-4">
    <div class="bg-purple me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <svg width="70" height="70" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h2 class="display-5 fw-normal">Admin PPIC Profile</h2>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
            <div class="col-md-9 p-lg-5 mx-auto">
                <h3 class="display-6 fw-normal text-dark mt-3 mb-0"><?= $_SESSION['login-admin']['nama'] ?></h3>
                <p class="lead fs-3 text-dark mb-2"><?= $_SESSION['login-admin']['nik'] ?></p>
                <p class="lead fw-normal text-dark"><span class="font-monospace"> <?= $_SESSION['login-admin']['alamat'] ?></span></p>
                <a href="/vismen/list">&larr; Kembali ke halaman utama</a>
                <a class="btn btn-outline-gray" href="/auth/logout" id="logout">
                    Sign out <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </div>
</div>