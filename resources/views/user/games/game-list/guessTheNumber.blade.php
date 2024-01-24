@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row p-3 rounded-3" style="background:#ddc6e8;">
            <div class="col-12 m-0">
                <div class="alert-container alert-info-guess">
                    <!-- Container menampilkan pesan hasil -->
                </div>
            </div>
            <h4 class="font-weight-bolder py-3">Guess The Number: Tebak angka 1 - 100 🔢</h4>

            <div class="col-12 col-md-6 mb-4">
                <div class="card rounded-4 border-0">
                    <div class="card-body">
                        <p>

                            Pilihlah angka antara 1 hingga 100. <br>
                            Bisakah kamu menebaknya dengan cepat?

                        </p>
                        <div class="form">
                            <label for="guessField" class="form-label text-secondary">
                                Masukkan Angka
                            </label>
                            <input type="text" id="guessField" class="guessField form-control rounded-3 mb-3">
                            <button type="submit" value="Submit guess" class="guessSubmit btn btn-primary"
                                id="submitguess">
                                Check
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="card rounded-4 border-0">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Riwayat Tebakan</h5>
                            <p class="mb-0">sisa tebakan : <span id="remaining"></span></p>
                        </div>
                        <ul id="historyList" class="list-group list-group-flush">
                            <!-- Daftar riwayat here-->
                        </ul>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                let level = 1; // Tingkat Kesulitan
                let maxAttempts = 5; // Batasan Maksimal Percobaan
                let remaining = maxAttempts;

                // Generate a Random Number
                let y = Math.floor(Math.random() * 100 + 1);

                // Counting the number of guesses
                let guess = 1;

                document.getElementById("remaining").innerText = remaining; // Menampilkan sisa tebakan awal

                document.getElementById("submitguess").onclick = function() {
                    let x = document.getElementById("guessField").value;

                    if (x == y) {
                        showResultMessage("CONGRATULATIONS!!! YOU GUESSED IT RIGHT IN " + guess + " GUESS ", true);
                        level++;
                        maxAttempts += 5; // Menambah batasan percobaan untuk level berikutnya
                        resetGame();
                    } else if (x == '') {
                        showResultMessage("Masukkan angka!", false);
                    } else if (guess == maxAttempts) {
                        showResultMessage("GAME OVER! Jawabannya adalah " + y, false);
                        remaining--;

                        const historyList = document.getElementById('historyList');
                        const historyItem = document.createElement('li');
                        historyItem.className = 'list-group-item list-group-item-info';
                        historyItem.textContent = `GAME OVER! Jawabannya adalah ${y}`;
                        historyList.appendChild(historyItem);

                        resetGame();
                    } else if (x > y) {
                        guess++;
                        remaining--;
                        showResultMessage("OOPS SORRY!! TRY A SMALLER NUMBER", false);
                    } else {
                        guess++;
                        remaining--;
                        showResultMessage("OOPS SORRY!! TRY A GREATER NUMBER", false);
                    }

                    document.getElementById("remaining").innerText = remaining;
                }

                function resetGame() {
                    level = 1;
                    // maxAttempts = 5;
                    // remaining = maxAttempts;
                    y = Math.floor(Math.random() * 100 + 1);
                    guess = 1;

                    document.getElementById("remaining").innerText = remaining;
                }

                function showResultMessage(message, isSuccess) {
                    const alertContainer = document.querySelector('.alert-container');
                    const alertClass = isSuccess ? 'alert-success' : 'alert-danger';

                    const alertElement = document.createElement('div');
                    alertElement.className = `alert alert-dismissible fade show ${alertClass}`;
                    alertElement.innerHTML = `
                        <div>
                            ${isSuccess ? '' : '<i class="fas fa-triangle-exclamation"></i>'}
                            ${message}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;

                    // Hapus semua elemen dalam container
                    alertContainer.innerHTML = '';

                    // Tambahkan elemen alert ke dalam container
                    alertContainer.appendChild(alertElement);

                    const lastGuess = document.getElementById("guessField").value;
                    const comparison = lastGuess > y ? 'dibawah' : 'diatas';
                    const text = "Coba angka"


                    const historyList = document.getElementById('historyList');
                    const historyItem = document.createElement('li');
                    historyItem.className = `list-group-item ${isSuccess ? 'list-group-item-success' : 'list-group-item-danger'}`;
                    historyItem.textContent = `${text} ${comparison} ${lastGuess}`;
                    historyList.appendChild(historyItem);


                    // Atur timeout untuk menghilangkan alert setelah 2 detik
                    setTimeout(() => {
                        alertElement.classList.remove('show');
                        alertElement.remove();
                    }, 2000);
                }
            </script>
        </div>
    </div>
@endsection

<style>
    .alert-info-guess {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
    }
</style>
