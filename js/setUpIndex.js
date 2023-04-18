function setProfilePicture(){
    const user_pk = document.getElementById('user_pk').value;
    const pdp = document.getElementById("profile_pict")
    if (pdp != null){
        const pdp_path = "uploads/" + user_pk + ".png";
        pdp.setAttribute("src", pdp_path)
    }
}

setProfilePicture();