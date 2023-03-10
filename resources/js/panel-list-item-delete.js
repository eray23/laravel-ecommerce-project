$(document).ready(function() {
    $("a.list-item-delete").on("click", function (e) {
        e.preventDefault()
        let url = $(this).attr("href")
        alert(url)
        if (url !== null) {
            let confirmation = confirm("bu kaydı silmek istediğinize emin misiniz?")
            if (confirmation){
                axios.delete(url).then(result => {
                console.log(result.data)
            }).catch(error => {
                console.log(error)
            })}

        }
    })
})
