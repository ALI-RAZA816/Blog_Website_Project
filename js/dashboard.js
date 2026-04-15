document.addEventListener('DOMContentLoaded',()=>{
    // show dashboard side bar
    dashboard_sidebar = document.querySelector('.sidebar');
    dashboard_bars = document.querySelector('.dashboard-bars');
    dashboard_angle_right = document.querySelector('#dashboard-angle-right');

    dashboard_bars.addEventListener('click',()=>{
        dashboard_sidebar.style.left = '0';
    });
    dashboard_angle_right.addEventListener('click',()=>{
        dashboard_sidebar.style.left = '-100%';
    });
});