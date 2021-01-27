export default function submitTask (id) {
    const d = document;

    const $idSubmit = d.getElementById(id);

    console.log($idSubmit);

    $idSubmit.addEventListener("click", e => {


        location.reload();
        


    })


}