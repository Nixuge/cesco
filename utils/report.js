export default function report(id) {
    let sure = prompt("Cette article ne respect pas les règle de CescoSite ? (oui/non)", "non");
    if (sure == "oui") {
    
        location.href = "./api/report.php?id=" + id
    }
    
}
