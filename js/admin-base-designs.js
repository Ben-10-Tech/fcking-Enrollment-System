function menu()
{
    var sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');

    if(!sidebar.classList.contains('active'))
    {
        document.querySelector('.students-ul').classList.remove('active');
        document.querySelector('.teachers-ul').classList.remove('active');
        document.querySelector('.enrolls-ul').classList.remove('active');
    }
}

function studentsDrop()
{
    var students = document.querySelector('.students-ul');
    students.classList.toggle('active');

    if (!document.querySelector('.sidebar').classList.contains('active'))
    {
        students.classList.remove('active');
    }
}

function teachersDrop()
{
    var teachers = document.querySelector('.teachers-ul');
    teachers.classList.toggle('active');

    if (!document.querySelector('.sidebar').classList.contains('active'))
    {
        teachers.classList.remove('active');
    }
}

function enrollsDrop()
{
    var enrolls = document.querySelector('.enrolls-ul');
    enrolls.classList.toggle('active');

    if (!document.querySelector('.sidebar').classList.contains('active'))
    {
        enrolls.classList.remove('active');
    }
}

function accountDrop() {
    var account = document.querySelector('.account-settings-btn-content-wrapper');
    account.classList.toggle('show');
}

/* function accountDrop() {
    var account = document.querySelector('.account-settings-btn-content-wrapper');
    account.classList.toggle('show');
    }

    // Close the dropdown if the user clicks outside of it
    //di pa nagana
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
} */
