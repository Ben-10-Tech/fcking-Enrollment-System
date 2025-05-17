document.addEventListener('DOMContentLoaded', function (){ 

    document.addEventListener('click', function (e) {
       if (e.target.classList.contains('view-button')) {
            const enrolleeId = e.target.getAttribute('data-id');
            console.log(enrolleeId);
            const modal = document.getElementById('enrolleeModal');
            const modalContent = document.querySelector('.modal-content');
                
            modal.style.display = 'block';
            modalContent.innerHTML = '<p> Wait for data to load... </p>'; // Show loader while fetching data
            fetch('../server_side/adminEnrolleeStatusView.php?id=' + encodeURIComponent(enrolleeId))
            .then(response => response.text())
            .then(data => {
                modalContent.innerHTML = data;
                modalContent.innerHTML += `
                    <button class="accept-btn" data-action="accept"data-id="${enrolleeId}">Accept</button>
                    <button class="reject-btn" data-action="reject" data-id="${enrolleeId}">Reject</button>
                    <button class="toFollow-btn" data-action="toFollow" data-id="${enrolleeId}">To Follow</button>
                `;

                const close = document.querySelector('.close');
                close.addEventListener('click', function(){
                    modal.style.display = 'none';
                });
            })
            .catch(error => console.error('Error loading data:', error));
       }
    })

    document.addEventListener('click', function(e){
        if (e.target.matches('.accept-btn') || e.target.matches('.reject-btn')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const action = e.target.getAttribute('data-action');
            let status = 0
            if (action === "accept") {
                status = 4
            } 
            else {
                alert('unrecognized action');
            }
            fetch('../server_side/updateEnrolleeStatus.php', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    id: enrolleeId,
                    status: status})
            })
            .then(response => response.json())
            .then(data=> {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                }
                else {
                    alert('Error updating status: ' + data.message);
                }
            })
        }
        if (e.target.matches('.toFollow-btn')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const modal = document.getElementById('enrolleeModal');
            const modalContent = document.querySelector('.modal-content');
            modalContent.innerHTML = `
                <span class="close">&times;</span>
                <p> What is the reason for following up this enrollee? </p>
                <input type="checkbox" id="wrong-input" name="wrong-input" value="wrong-input" class="checkboxes">
                <label for="wrong-input">There are fields with wrong input</label><br>
                <input type="checkbox" id="no-input" name="no-input" value="wrong-input" class="checkboxes">
                <label for="no-input">There are fields without input</label><br>
                <div id="fields-to-flag">
            `;
            const close = document.querySelector('.close');
                close.addEventListener('click', function(){
                    modal.style.display = 'none';
                });
            const form = document.getElementById('deny-followup');    
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // you forgot this too!  
                const formData = new FormData(form);
                for (const [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }
                fetch('../server_side/adminEnrolleeFollowup.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data =>{
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    }
                    else {
                        alert("ERROR: " + data.message);
                    }
                })
                .catch(error => {
                console.error("Fetch error:", error);
                alert("Something went wrong. Please try again.");
                });
            });
        }
    });
});