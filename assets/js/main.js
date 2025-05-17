// Main JavaScript file for the hotel management system

// Auto-dismiss alerts after 5 seconds
document.addEventListener("DOMContentLoaded", () => {
  // Get all alert elements
  const alerts = document.querySelectorAll(".alert")

  // Set timeout to dismiss each alert
  alerts.forEach((alert) => {
    setTimeout(() => {
      // Ensure bootstrap is available
      if (typeof bootstrap !== "undefined") {
        const bsAlert = new bootstrap.Alert(alert)
        bsAlert.close()
      } else {
        console.error("Bootstrap is not defined. Ensure it is properly loaded.")
        // Optionally, remove the alert element if bootstrap is not available
        alert.remove()
      }
    }, 5000)
  })
})

