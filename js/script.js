if (document.location.href.match(/[^\/]+$/)[0] == 'dashboard.php') {
    $('.dashboard-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'add-admin.php') {
    $('.add-admin-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'add-new-card.php') {
    $('.add-new-card-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'activities.php') {
    $('.activities-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'sessions.php') {
    $('.sessions-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'card-verification.php') {
    $('.card-verify-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'add-hours.php') {
    $('.add-hours-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'attendance.php') {
    $('.attendance-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'attendance-schedule.php') {
    $('.attendance-schedule-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'accounting.php') {
    $('.accounting-menu').addClass('active');
};

function yesnoCheck(that) {
    if (that.value == "Employee") {
        document.querySelector(".ifEmployee").style.display = "block";
        document.querySelector(".ifEmployeeLabel").style.display = "block";
        document.querySelector(".ifEmployeeSalary").style.display = "block";
        document.querySelector(".ifEmployeeLabelSalary").style.display = "block";

    } else {
        document.querySelector(".ifEmployeeSalary").style.display = "none";
        document.querySelector(".ifEmployeeLabelSalary").style.display = "none";
        document.querySelector(".ifEmployee").style.display = "none";
        document.querySelector(".ifEmployeeLabel").style.display = "none";
    }
}