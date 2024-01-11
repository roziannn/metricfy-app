function startTimer() {
    var timerDisplay = document.getElementById("timer-display");
    var estimatedDuration = "{{ $banksoal->estimated_duration }}";

    // Parse hours, minutes, and seconds dari estimated_duration string
    var parts = estimatedDuration.split(":");
    var hours = parseInt(parts[0], 10);
    var minutes = parseInt(parts[1], 10);
    var seconds = parseInt(parts[2], 10);

    // Convert ke detik
    var totalSeconds = hours * 3600 + minutes * 60 + seconds;

    function updateTimer() {
        var minutes = Math.floor(totalSeconds / 60);
        var seconds = totalSeconds % 60;

        timerDisplay.textContent = pad(minutes) + ":" + pad(seconds);

        if (--totalSeconds < 0) {
            clearInterval(intervalId);
            timerDisplay.textContent = "Waktunya habis!";
        }
    }

    function pad(val) {
        return val < 10 ? "0" + val : val;
    }

    updateTimer(); //update setiap detik
    var intervalId = setInterval(updateTimer, 1000);
}
