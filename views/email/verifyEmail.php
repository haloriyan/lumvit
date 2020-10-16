<div style="background-color: #ecf0f1;padding: 80px 210px;font-family: sans-serif;color: #444;">
    <div style="background-color: #fff;padding: 50px;box-shadow: 1px 1px 5px 1px #ddd;border-radius: 6px;">
        <p style="margin-top: 20px;line-height: 30px;">
            Halo <?= $name ?>,
        </p>
        <p style="margin-top: 20px;line-height: 30px;">
            Sebelum kamu dapat menggunakan BikinCV App dan membuat CV, kamu harus memverifikasi email terlebih dahulu dengan mengklik tautan ini
        </p>

        <div style="padding-top: 50px;">
            <a 
                href="<?= $baseUrl ?>account-verification/<?= $email ?>"
                style="background-color: #3498db;color: #fff;text-decoration: none;padding: 15px 25px;border-radius: 900px;">
                Verifikasi Email
            </a>
        </div>
        <br /><br />

        <p style="margin-top: 20px;line-height: 30px;">
            Regards,<br />
            Tim BikinCV App
        </p>
    </div>
</div>