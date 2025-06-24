const settingsBtn = document.getElementById("settingsBtn")
const pointsBtn = document.getElementById("pointsBtn")
const items = document.getElementById("items")

if(settingsBtn) {
  settingsBtn.addEventListener("click" , () => {
    items.classList.toggle("active")
  })
}


if(pointsBtn) {
  pointsBtn.addEventListener("click" , () => {
    items.classList.toggle("activePoints")
  })
}


// Side Bar Activation 

const sidebar = document.getElementById("sidebar")
const sidebarBtn = document.getElementById("sidebarBtn")

sidebarBtn.addEventListener("click" , () => {
  sidebar.classList.toggle("active")
})