function passwordModal() {
    const modal = new Modal(document.getElementById("passwordModal"), {
      placement: "center",
      backdropClasses:
        "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
      closable: false,
    });
    return modal;
  }
  
  function notificationModal() {
    const modal = new Modal(document.getElementById("notificationModal"), {
      placement: "center",
      backdropClasses:
        "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
      closable: false,
    });
    return modal;
  }
  
  function logoutModal() {
    const modal = new Modal(document.getElementById("logoutModal"), {
      placement: "center",
      backdropClasses:
        "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
      closable: false,
    });
    return modal;
  }