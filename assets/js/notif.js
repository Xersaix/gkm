var numberNotif = document.getElementById("number-notif");
var numberNotif2 = document.getElementById("number-notif2");

function setNotificationNumber() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../helpers/get_number_notif.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText); // Analyse la réponse JSON
       
        numberNotif.innerHTML = response;
        numberNotif2.innerHTML = `${response} Nouvelles Notifications`;
      }
    };
    xhr.send(); // Vous pouvez ajuster la valeur de "id" si nécessaire
  }
  



document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour charger et afficher les notifications
    function loadAndDisplayNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Mettez à jour la vue des notifications en appelant la fonction
                    // pour afficher les notifications avec les nouvelles données.
                    var notificationsContainer = document.getElementById("notifications-container");
                    notificationsContainer.innerHTML = xhr.responseText;
                    setNotificationNumber()


                } else {
                    console.error("Erreur lors du chargement des notifications.");
                }
            }
        };
        xhr.open("GET", "../helpers/get_notifications.php", true);
        xhr.send();
    }

    // Charger les notifications au chargement de la page
    loadAndDisplayNotifications();


    // Gestionnaire d'événement pour le clic sur le bouton "close-notif"
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("close-notif")) {
            var notificationId = event.target.getAttribute("data-notification-id");
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../helpers/delete_notif.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Mettez à jour la vue des notifications après avoir marqué la notification comme vue
                    loadAndDisplayNotifications();
                }
            };
            xhr.send("id=" + notificationId);
        }
    });
});







