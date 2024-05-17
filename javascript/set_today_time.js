function setInitialDateTime() {
    const now = new Date();
    const offset = now.getTimezoneOffset();
    now.setMinutes(now.getMinutes() - offset);
    const localISOTime = now.toISOString().slice(0, 16);

    document.getElementById('timeIn').value = localISOTime;
    document.getElementById('timeOut').value = localISOTime;
}

window.onload = setInitialDateTime;