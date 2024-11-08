
let update = 0;
document.body.addEventListener('click', function(event) {
    if (event.target.id === 'closeBtn') {
        if(updateFormContainer2.style.display == "block") {
            updateFormContainer2.style.display = "none";
            update = 0;
        }
        updateFormContainer1.style.display = "none";
        deleteFormContainer.style.display = "none";
        appFormContainer.style.display = "none";
    }

    if (event.target.id === 'deleteBtn') {
        deleteFormContainer.style.display = "block";
    }

    if (event.target.id === 'addBtn') {
        appFormContainer.style.display = "block";
    }
    
    if (event.target.id === 'updateBtn') {
        updateFormContainer1.style.display = "block";
        updateFormContainer2.style.display = "none";
        update = 1;
    }

    if (event.target.id === 'logoutBtn') {
        window.location.href = '../logout.php';
    }
});

let sidebarOpen = true;

toggleBtn.addEventListener( 'click', (event) => {
    event.preventDefault();

    if(sidebarOpen){
        dashboard_sidebar.style.width = '6%';
        dashboard_sidebar.style.transition = '0.5s all';
        dashboard_content_container.style.width = '84%';
        userRole.style.fontSize = '1rem';
        userRole.style.marginLeft = '-.4rem';
        dashboard_sidebar_user_img.style.width = '3rem';
        dashboard_sidebar_user_name.style.display = 'none';
        toggleBtnContainer.style.marginLeft = '0';
    
        let menuText = document.getElementsByClassName("menuText");
        let menuIcons = document.getElementsByClassName("menuIcons");
        
        Array.from(menuText).forEach(item => {
            item.style.display = 'none';
        });
        
        Array.from(menuIcons).forEach(item => {
            item.style.marginLeft = '1.5 rem';
        });

        sidebarOpen = false;
    } else {
        dashboard_sidebar.style.width = '18%';
        dashboard_content_container.style.width = '80%';
        userRole.style.fontSize = '1.5rem';
        dashboard_sidebar_user_img.style.width = '5rem';
        dashboard_sidebar_user_name.style.display = 'block';
        
        let menuText = document.getElementsByClassName("menuText");
        let menuIcons = document.getElementsByClassName("menuIcons");
        
        Array.from(menuText).forEach(item => {
            item.style.display = 'inline-block';
        });
        
        Array.from(menuIcons).forEach(item => {
            item.style.marginLeft = '.8rem';
            item.style.marginRight = '.8rem';
        });

        sidebarOpen = true;
    }
});