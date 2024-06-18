  <!--script src="https://code.jquery.com/jquery-3.2.1.min.js"></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script-->
  <script>
   var route_prefix = "/filemanager";
  </script>

  <!-- CKEditor init -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>




  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
  </script>


  <script>
    var lfm = function(id, type, options) {
      let button = document.getElementById(id);

      button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
			
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');

          // set the value of the desired input to image url
          target_input.value = file_path;
          target_input.dispatchEvent(new Event('change'));

          // clear previous preview
          target_preview.innerHtml = '';

          // set or change the preview image src
          items.forEach(function (item) {
            let img = document.createElement('img')
            img.setAttribute('style', 'height: 5rem')
            img.setAttribute('src', item.thumb_url)
            target_preview.appendChild(img);
          });

          // trigger change event
          target_preview.dispatchEvent(new Event('change'));
        };
      });
    };

    //lfm('lfm2', 'file', {prefix: route_prefix});
  </script>

  <!--link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script-->
  <script>
    $(document).ready(function()
	{

      // Define function to open filemanager window
      var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
      };
	  
	  
	 // Удаление домена при отправке формы
		$('form').submit(function()
		{
			console.log($(this));
			let $objS = $(this).find('.relativePath');
			console.log( $objS);
			$objS.each(function(i,elem)
			{
				let searchValue = URL_GLOBAL + '/storage';
				console.log(searchValue);
				let path = $(elem).val();
				path = path.replace(searchValue, '');

				$(elem).val( path );
			});
			//return false;
			return true;
		});


    });
  </script>
  
 <script>
//Загрузка файла с проверкой mime_type + Drag&Drop
	function upload_fileDD(e, objDD) {
		e.preventDefault();
		let idTemp = "rezDD" + objDD;
		fileObjTemp = e.dataTransfer.files;
		file_uploadDD(e.dataTransfer.files, objDD);
	
	};
	 
	function file_explorerDD(ind) {
		let objDD = ind;
		let idInput = 'selectfile' + objDD;
		document.getElementById(idInput).click();
		document.getElementById(idInput).onchange = function() {
		let fileObjTemp = document.getElementById(idInput).files;
		file_uploadDD(fileObjTemp, objDD);
		};
	};
	
	function file_uploadDD(file_obj, objDD) 
	{
		document.querySelector('#infoDD'+ objDD + " .level1" ).style.display = "none";
		document.querySelector('#infoDD'+ objDD + " .level2" ).style.display = "block";	
		document.querySelector('#infoDD'+ objDD + " .level3" ).style.display = "none";	
		document.querySelector('#infoDD'+ objDD + " .level4" ).style.display = "none";	
		if(file_obj != undefined)
		{
			var form_data = new FormData();
			for(i=0; i<file_obj.length; i++) {  
				form_data.append('file[]', file_obj[i]);  
			}
			
			fetch("{{ route('uploadFile')}}", { 
			method: "POST",
			body: form_data,   
			headers:{
			'X-CSRF-TOKEN':'{{ csrf_token() }}'		} 
			})     
			.then(
			(response) => response.text(), // Возвращаем текст из промиса
			(reject) => console.error('Fetch отклонён') // Обрабатываем ошибку
			  )
			  .catch( () => console.log('ошибка сервер')) // перехватываем ошибку сервер
			  .then(
				(text) => {
				  document.querySelector('#rezDD'+ objDD ).value = text; 
				  control(text, objDD);
				 // return text;
				},
				(reject) => console.error('Ошибка на клиенте')
			  )
			  .catch( () => console.log('ошибка фронтенда')) // перехватываем ошибку фронтенда
		}
		//return ttt;
	};	

	function control(txt, ind)
	{ 
		//alert (txt);
		document.querySelector('#infoDD'+ ind + " .level2" ).style.display = "none";
		if( txt == 'mimeTypeErr')
		{
			document.querySelector('#infoDD'+ ind + " .level4" ).style.display = "block";
		}
		else
		{
			document.querySelector('#infoDD'+ ind + " .level3" ).style.display = "block";		
		}
	}
</script> 