  <!--Page Wrapper-->

<!-- Page JavaScript Files-->
<script src="./assets/general/js/jquery.min.js"></script>
<script src="./assets/general/js/jquery-1.12.4.min.js"></script>
<!--Popper JS-->
<script src="./assets/general/js/popper.min.js"></script>
<!--Bootstrap-->
<script src="./assets/general/js/bootstrap.min.js"></script>
<!--Sweet alert JS-->
<script src="./assets/general/js/sweetalert.js"></script>
<!--Progressbar JS-->
<script src="./assets/general/js/progressbar.min.js"></script>
<!--Charts-->
<!--Canvas JS-->
<script src="./assets/general/js/charts/canvas.min.js"></script>
<!--Bootstrap Calendar JS-->
<script src="./assets/general/js/calendar/bootstrap_calendar.js"></script>
<script src="./assets/general/js/calendar/demo.js"></script>
<!--Bootstrap Calendar-->

<!--Custom Js Script-->
<script src="./assets/general/js/custom.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!--Custom Js Script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  const editor1 = Array.from(document.getElementsByName("editor1")).length;
  if(editor1 > 0) {
    CKEDITOR.replace('editor1');
  }

  const keterangan = Array.from(document.getElementsByName("keterangan")).length;
  if(keterangan > 0) {
    CKEDITOR.replace('keterangan');
  }

  $(document).ready( function () {
    $('#myTable')?.DataTable();
    $('#myTable2')?.DataTable();
  } );
</script>
<script>
  function toggle_sidebar() {
    document.getElementById("form_element").style.display = "none";
    $('#sidebar-toggle-btn').toggleClass('slide-in');
    $('.sidebar').toggleClass('shrink-sidebar');
    $('.content').toggleClass('expand-content');
    
    //Resize inline dashboard charts
    $('#incomeBar canvas').css("width","100%");
    $('#expensesBar canvas').css("width","100%");
    $('#profitBar canvas').css("width","100%");
}
</script>

<script>
    const btns = Array.from(document.querySelectorAll("#detail-kerusakan"));

    btns.forEach(btn => {
      btn.addEventListener("click", async (e) => {
        const {idRusak} = e.target.dataset;
        const result = await axios({
          method: 'get',
          url: `api/kerusakan.php?id_rusak=${idRusak}`
        })

        const sparepart = await axios({
          method: 'get',
          url: `api/sparepart_kerusakan.php?id_rusak=${idRusak}`
        })

        const {data: dataSparepart} = sparepart
        const {data} = result;
        
        const namaPeminjam = document.getElementById("namaPeminjam");
        const nim = document.getElementById("nim");
        const noRuangan = document.getElementById("noRuangan");
        const detail = document.getElementById("detail_kerusakan");
        const idRusakField = document.getElementById("id_rusak");
        const detailPerbaikanInput = document.getElementById("detail_perbaikan_input");
        const inUseSparepart = document.getElementById("in-use-sparepart");

        inUseSparepart.firstChild.remove()
        namaPeminjam.value = data.nama;
        nim.value = data.nim;
        noRuangan.value = data.no_ruangan;
        detail.innerHTML = data.detail_rusak;
        idRusakField.value = data.id_rusak
        detailPerbaikanInput.value = data.detail_perbaikan

        dataSparepart.forEach(data => {
          const tr = `
            <tr>
              <td>${data.nama_sp}</td>
              <td>${data.jumlah}</td>
            </tr>
          `
          inUseSparepart.innerHTML += tr
        })
      })
    })
</script>

<script>
  function setStokValue(target, action) {
      const { idAlat } = target.target.dataset
      const stokParent = document.getElementById(`jumlah-${idAlat}`)
      let stok = Number(stokParent.innerText)

      if(action === "tambah") {
        stok += 1;
      } else {
        stok -= 1;
      }
      
      stokParent.innerText = stok.toString()
      return {stok, idAlat}
  }

  async function updateStok(payload) {
      const res = await axios({
          method: "post",
          url : "api/peralatan-update.php",
          data: payload
      })

      const {success} = res.data;
      return success
  }

  const btnsTambah = Array.from(document.querySelectorAll("#tambahStok"))
  const btnsKurang = Array.from(document.querySelectorAll("#kurangStok"))
  const btnsHapus = Array.from(document.querySelectorAll("#hapusAlat"))

    btnsTambah.forEach(btn => {
      btn.addEventListener("click", async (e) => {
        const payload = setStokValue(e, "tambah")
        await updateStok(payload)
      })
    })

    btnsKurang.forEach(btn => {
      btn.addEventListener("click", async (e) => {
        const payload = setStokValue(e, "kurang")
        const success = await updateStok(payload)

        if(success && payload.stok <= 0) {
          const row = document.getElementById(`row-${payload.idAlat}`)
          row.remove()
        }
      })
    })

    btnsHapus.forEach(btn => {
      btn.addEventListener("click", async (e) => {
        const {idAlat} = e.target.dataset;
        const row = document.getElementById(`row-${idAlat}`)
        row.remove()
        await axios({
          method: "post",
          url: "api/peralatan-hapus.php",
          data: {
            idAlat
          }
        })
      })
    })
</script>

<script>
  const btn = document.getElementById("cek-alat");
  btn.addEventListener("click", async(e) => {
    const tbody = document.getElementById("list-alat");
    tbody.innerHTML = "";

    const idRuangan = document.getElementById("ruangan").value
    const res = await axios({
      method: "get",
      url: `api/peralatan-get.php?id_ruangan=${idRuangan}`
    })
    const {data} = res;

    data.forEach(d => {
      const row = `
        <tr>
          <td>${d.nama_alat}</td>
          <td>${d.jumlah}</td>
        </tr>
      `
      tbody.innerHTML += row;
    })
  })
</script>

<script>
  function remove(target) {
    document.getElementById(`row-${target}`).remove()
  }

  function append(data, current) {
    const parent = document.getElementById("sparepart");
    let el = ``;
    data.forEach(d => {
      el += `
        <option value="${d.id_alat}">${d.nama_sp}</option>
      `
    })
    const select = `
      <div class="row" id="row-${current}">
        <div class="col-md-8">
          <select name="id_sparepart[]" class='form-control mt-2'>${el}</select>
        </div>
        <div class="col-md-2">
          <input type="number" class="form-control mt-2" name="qty[]">
        </div>
        <div class="col-md-1">
          <a class="btn btn-danger btn-sm text-white mt-2" onclick="remove(${current})"><i class="fa fa-minus"></i></a>
        </div>
      </div>
    `
    parent.innerHTML += select
  }

  async function getSparepart() {
    const res = await axios({
      method: "get",
      url: "api/sparepart.php"
    })

    return res
  }

  getSparepart()
  .then(res => {
    const { data } = res

    const btnTambah = document.getElementById("tambah-sparepart")
    const rmBtns = null;
    let current = 1;

    append(data, current)

    btnTambah .addEventListener("click", e => {
      e.preventDefault()
      current+=1
      append(data, current)
    })
  })
</script>
</body>

</html>