<script>
   // Assuming you have a configuration object
   const config = {
      APP_URL: "http://127.0.0.1:8000",
   };
   async function getDatas(url) {
      const res = await fetch(url)
      return await res.json()
   }
   document.querySelector('.searchProduct').addEventListener('submit', (e) => {
      e.preventDefault();
      const url = config.APP_URL;
      let value = document.querySelector('.search_form').value
      const wrapper = document.querySelector('.results')
      const lang = document.querySelector('.title').getAttribute('data-lang')
      getDatas(url + "/getProducts/" + value).then(res => {
         res.forEach(data => {
            let element = `
               <a href="${config.APP_URL}/product_info/${data.slug[lang]}" class="list border-bottom">
                  <div class="list_image">
                     <img src="{{ asset('storage/${data.image}') }}" alt="" />
                  </div>
                  <div class="d-flex flex-column ml-3">
                     <span>${data.name[lang]}</span>
                  </div>
               </a>
            `;
            wrapper.insertAdjacentHTML('beforeend', element)
         })
      })
   });
</script>