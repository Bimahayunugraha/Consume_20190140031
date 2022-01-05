function loadTable() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost:8080/book");
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var trHtml = '';
            const objects = JSON.parse(this.responseText);
            for (let object of objects) {
                trHtml += '<tr>';
                trHtml += '<td>' + object['id'] + '</td>';
                trHtml += '<td>' + object['kategoriBuku'] + '</td>';
                trHtml += '<td>' + object['judul'] + '</td>';         
                trHtml += '<td>' + object['penerbit'] + '</td>';
                trHtml += '<td>' + object['pengarang'] + '</td>';
                trHtml += '<td>' + object['harga'] + '</td>';
                trHtml += '<td>' + object['qty'] + '</td>';
                trHtml += '<td>' + object['deskripsiBuku'] + '</td>';
                trHtml += '<td><button type="button" class="btn btn-outline-secondary" onclick = "showUserEditBox(' + object['id'] + ')">Edit</button></td>';
                trHtml += '<td><button type="button" class="btn btn-outline-danger" onclick="userDelete(' + object['id'] + ')"> Del</button></td>';
                trHtml += '</tr>';
            }
            document.getElementById("mytable").innerHTML = trHtml;
        }
    };
}
loadTable();
//* POST Data --------
function showUserCreate() {
    Swal.fire({
        title: 'Add Book Data',
        html: '<input id="id" type="hidden">' +
            '<input id="kategoriBuku" class="swal2-input" placeholder="Kategori Buku">' +
            '<input id="judul" class="swal2-input" placeholder="Judul Buku">' +
            '<input id="pengarang" class="swal2-input" placeholder="Pengarang">' +
            '<input id="penerbit" class="swal2-input" placeholder="Penerbit">' +
            '<input id="qty" class="swal2-input" placeholder="Quantity">' +
            '<input id="harga" class="swal2-input" placeholder="Harga">' +
            '<input id="deskripsiBuku" class="swal2-input" placeholder="Deskripsi Buku">',
        focusConfirm: false,
        preConfirm: () => { userCreate(); }
    })
}

function userCreate() {
    const kategoriBuku = document.getElementById("kategoriBuku").value;
    const judul = document.getElementById("judul").value;
    const pengarang = document.getElementById("pengarang").value;
    const penerbit = document.getElementById("penerbit").value;
    const qty = document.getElementById("qty").value;
    const harga = document.getElementById("harga").value;
    const deskripsiBuku = document.getElementById("deskripsiBuku").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://localhost:8080/book");
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.send(JSON.stringify({
        "kategoriBuku": kategoriBuku,
        "judul": judul,
        "pengarang": pengarang,
        "penerbit": penerbit,
        "harga": harga,
        "qty": qty,
        "deskripsiBuku": deskripsiBuku
    }));
    xhttp.onreadystatechange = function() {
        if (this.status == 200) {
            const objects = JSON.parse(this.responseText);
            Swal.fire(objects['message']);
            loadTable();
        }
    }
}

//* PUT Data --------
function showUserEditBox(id) {
    console.log(id);
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost:8080/book/" + id);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const objects = JSON.parse(this.responseText);
            const user = objects["user"];
            console.log(user);
            Swal.fire({
                title: 'Edit Book Data',
                html: '<input id="id" type="hidden" value="' + objects['id'] + '">' +
                '<input id="kategori" class="swal2-input" placeholder="Kategori Buku" value="' + objects['kategoriBuku'] + '">' +
                    '<input id="namaBuku" class="swal2-input" placeholder="Judul Buku" value="' + objects['judul'] + '">' +
                    '<input id="pengarang" class="swal2-input" placeholder="Pengarang Buku" value="' + objects['pengarang'] + '">' +
                    '<input id="penerbit" class="swal2-input" placeholder="Penerbit" value="' + objects['penerbit'] + '">' +
                    '<input id="pengarang" class="swal2-input" placeholder="Quantity" value="' + objects['qty'] + '">' +
                    '<input id="harga" class="swal2-input" placeholder="Harga Buku" value="' + objects['harga'] + '">' + 
                    '<input id="pengarang" class="swal2-input" placeholder="Deskripsi Buku" value="' + objects['deskripsiBuku'] + '">',
                focusConfirm: false,
                preConfirm: () => { userEdit(); }
            })
        }
    };
}

function userEdit() {
    const id = document.getElementById("id").value;
    const kategoriBuku = document.getElementById("kategoriBuku").value;
    const judul = document.getElementById("judul").value;
    const penerbit = document.getElementById("penerbit").value;
    const pengarang = document.getElementById("pengarang").value;
    const qty = document.getElementById("qty").value;
    const harga = document.getElementById("harga").value;
    const deskripsiBuku = document.getElementById("deskripsiBuku").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("PUT", "http://localhost:8080/book/updateBook");
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.send(JSON.stringify({
        "id": id,
        "kategoriBuku": kategoriBuku,
        "judul": judul,
        "pengarang": pengarang,
        "penerbit": penerbit,
        "qty": qty,
        "harga": harga,
        "deskripsiBuku": deskripsiBuku
    }));
    xhttp.onreadystatechange = function() {
        if (this.status == 200) {
            const objects = JSON.parse(this.responseText);
            Swal.fire(objects['message']);
            loadTable();
        }
    }
}

function userDelete(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("DELETE", "http://localhost:8080/book/" + id);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.send(JSON.stringify({ "id": id }));
    xhttp.onreadystatechange = function() {
        if (this.status == 200) {
            const objects = JSON.parse(this.responseText);
            Swal.fire(objects["message"]);
            loadTable();
        }
    }
}

function openDropdown(event,dropdownID){
    let element = event.target;
    while(element.nodeName !== "BUTTON"){
      element = element.parentNode;
    }
    var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
      placement: 'top-end'
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
  }