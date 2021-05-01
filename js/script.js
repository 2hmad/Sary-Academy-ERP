if (document.location.href.match(/[^\/]+$/)[0] == 'dashboard.php') {
    $('.dashboard-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'add-admin.php') {
    $('.add-admin-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'add-new-card.php') {
    $('.add-new-card-menu').addClass('active');
} else if (document.location.href.match(/[^\/]+$/)[0] == 'edit-hour-price.php') {
    $('.edit-hour-price-menu').addClass('active');
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
};