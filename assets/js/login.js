// Variabel merubah tampilan html
var $form = document.querySelector('.form');
var $error = document.querySelector('.error');// merubah tag html jika terjadi kesalahan (username/password tidak sesuai)
var $formGroup = document.querySelectorAll('.form-group');

// Variabel mendapatkan data dari html
var $username = document.getElementById('username');// mengambil id username dari html
var $password = document.getElementById('password');// mengambil id password dari html

//Fungsi menampilkan pesan
function addError(message) {
    $error.innerHTML = message;
    $error.style.display = 'block';
}

//Fungsi menyembunyikan pesan
function removeError() {
    $error.innerHTML = '';
    $error.style.display = 'hidden';
}

function validate(e) {
    // [(event)/(e)] e.preventDefault() untuk tdk menjalankan fungsi form apabila disubmit, yaitu mengirim data ke 'action'
    e.preventDefault();
    $error.style.display = 'none';
    var decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/; // deklrasi angka, Huruf Kecil, Huruf Besar


    if ($username.value === '' || $password.value === '') {
        addError('Nama Pengguna atau Password Salah!');
    }

    if ($password.value.length < 8) {
        addError('Password kurang dari 8 karakter')
    }

    if ($password.value.match(decimal)) {
    }
    else {
        addError('Password Harus menggunakan Huruf Besar, Huruf Kecil, dan Angka')
    }
}

$form.addEventListener('submit', validate);