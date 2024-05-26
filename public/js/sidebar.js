document
    .getElementById("sidebar-toggle")
    .addEventListener("click", function () {
        console.log("clicked");

        let sidebar = document.getElementById("lebar-sidebar");
        let ic_db = document.getElementById("ic-dashboard");
        let tk_db = document.getElementById("tk-dashboard");
        let ic_mng = document.getElementById("ic_management");
        let tk_mng = document.getElementById("tk_management");

        sidebar.classList.toggle("w-[280px]");
        sidebar.classList.toggle("w-[95px]");
        ic_db.classList.toggle("px-6");
        ic_db.classList.toggle("px-4");
        tk_db.classList.toggle("hidden");

        ic_mng.classList.toggle("px-6");
        ic_mng.classList.toggle("px-3");
        ic_mng.classList.toggle("ml-1");
    });
