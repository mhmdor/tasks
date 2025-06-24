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


function resetForm()
{
    $('.error').remove();

    $(':input')
        .not(':button, :submit, :reset, :checkbox, :radio')
        .val('');

    if ( $( ":input:checkbox" ).length )
        $(':input:checkbox').prop('checked', false);

    if ( $( ":input:radio" ).length )
        $(':input:radio').prop('checked', false);
}
