import { initializeApp } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-app.js";
import { getAuth, signOut } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-auth.js";

// Firebase Configuration
const firebaseConfig = {
    apiKey: "AIzaSyBTjJhI_7-HA24mEPJGUb08n_45dm6NIss",
    authDomain: "edubot-3f4db.firebaseapp.com",
    projectId: "edubot-3f4db",
    storageBucket: "edubot-3f4db.appspot.com",
    messagingSenderId: "232308858836",
    appId: "1:232308858836:web:a46776c8d73cbedbe34041",
    measurementId: "G-CD4J3K5N95"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

document.addEventListener("DOMContentLoaded", () => {
    const logoutLink = document.getElementById("logout-link");
    const profileBtn = document.querySelector(".profile-icon");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    console.log("Logout Link:", logoutLink);

    // Logout Functionality
    if (logoutLink) {
        console.log("✅ Logout link found. Adding event listener...");
        logoutLink.addEventListener("click", (e) => {
            e.preventDefault();
            console.log("🔓 Logout button clicked");

            signOut(auth)
                .then(() => {
                    console.log("✅ Sign-out successful");
                    alert("✅ Logged out successfully!");
                    window.location.href = "login.html"; // Redirect to login page
                })
                .catch((error) => {
                    console.error("❌ Error during logout:", error);
                    alert("❌ Error logging out. Try again.");
                });
        });
    } else {
        console.error("❌ Logout link not found in the DOM");
    }

    // Dropdown Functionality
    if (profileBtn && dropdownMenu) {
        console.log("✅ Profile button and dropdown menu found. Adding event listeners...");
        profileBtn.addEventListener("click", (e) => {
            e.preventDefault();
            dropdownMenu.style.display =
                dropdownMenu.style.display === "block" ? "none" : "block";
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", (e) => {
            if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.style.display = "none";
            }
        });
    } else {
        console.error("❌ Profile button or dropdown menu not found in the DOM");
    }
});