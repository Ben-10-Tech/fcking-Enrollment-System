function menu()
{
    var sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');

    if(!sidebar.classList.contains('active'))
    {
        document.querySelector('.dashboard-ul').classList.remove('active');
        document.querySelector('.subjects-ul').classList.remove('active');
        document.querySelector('.teachers-ul').classList.remove('active');
    }
}

function dashboarddrop()
{
    var dashboard = document.querySelector('.dashboard-ul');
    dashboard.classList.toggle('active');

    if (!document.querySelector('.sidebar').classList.contains('active'))
    {
        dashboard.classList.remove('active');
    }
}

function subjectsdrop()
{
    var subjects = document.querySelector('.subjects-ul');
    subjects.classList.toggle('active');

    if (!document.querySelector('.sidebar').classList.contains('active'))
    {
        subjects.classList.remove('active');
    }
}
  
function teachersdrop()
{
    var teachers = document.querySelector('.teachers-ul');
    teachers.classList.toggle('active');
    
    if (!document.querySelector('.sidebar').classList.contains('active'))
    {
        teachers.classList.remove('active');
    }
}
function accountDrop() {
    var account = document.querySelector('.account-settings-btn-content-wrapper');
    account.classList.toggle('show');
}

    // Close the dropdown if the user clicks outside of it
    //di pa nagana
    /*
    window.onclick = function(event) {
    if (!event.target.matches('.')) {
        var dropdowns = document.querySelector('.account-settings-btn-content-wrapper');
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}*/

/*MOBILE SIDEBAR ANIMATIONS*/
document.addEventListener('DOMContentLoaded', function() {
    var sidebar = document.querySelector('.mobile-sidebar-wrapper');
    sidebar.classList.remove('active');
});

//open sidebar sa mobile
function sideBarMobileOpen() 
{
    var sidebar = document.querySelector('.mobile-sidebar-wrapper');
    sidebar.classList.toggle('active');
}
//close sidebar sa mobile
function sideBarMobileClose() 
{
    var sidebar = document.querySelector('.mobile-sidebar-wrapper');
    sidebar.classList.remove('active');

    if(!sidebar.classList.contains('active'))
        {
            document.querySelector('.dashboard-mob-ul').classList.remove('active');
            document.querySelector('.subjects-mob-ul').classList.remove('active');
            document.querySelector('.teachers-mob-ul').classList.remove('active');
        }
}

function dashboardDropMobile() {
    var dashboardMob = document.querySelector('.dashboard-mob-ul');
    dashboardMob.classList.toggle('active')
}

function subjectsDropMobile() {
   var subjectsMob = document.querySelector('.subjects-mob-ul');
   subjectsMob.classList.toggle('active')
}   

function teachersDropMobile() {
    var teachersMob = document.querySelector('.teachers-mob-ul');
    teachersMob.classList.toggle('active')
 }   