<form action="/" method="post" name="preview">
   <div class="form">
      <p>
        <select size="1" name="theme">
           <option value="0">укажите тему сообщения</option>
           <option value="1">проверка заполнения полей</option>
        </select>  Тема сообщения
     </p>
      <p><input type="text" name="name" value="" /> Контактное лицо</p>
      <p><input type="text" name="email" value="" /> E-mail</p>
      <p><input type="text" name="phone" value="" /> Телефон</p>
   </div>
   <p><input type="checkbox" name="agree" value="on" /> Согласен на все условия</p>

   <p class="red" id="alert"></p>
   <input type="hidden" name="PHPSESSID" value="805e740a1ef94886f0ee725597c21845" />
   <input type="button" value="отправить" onclick="checkForm()" />
</form>

<script type="text/javascript">
   function text (str) { return /[0-9_;:'!~?=+<|>]/g.test(str); }

   function numeric (str) { return /^[0-9-\+\(\)\s]+z/.test(str + "z"); }

   function mail (str) { return /^[a-z0-9_\.]+@[a-z0-9_\.]+.[a-z]{2,3}$/.test(str); }

   function checkForm ()
      {
      var title;
      var elem;
      var dutyField = "Не заполнено поле ";
      var wrongField = "Неверное значение поля ";
      var check = true;

      function checkError (field, str)
         {
         document.getElementById("alert").innerHTML = str;
         document.forms.preview.field.focus();
         check = false;
         }

      document.getElementById("alert").innerHTML = "";

      if (check)
         {
         elem = document.preview.theme.value;
         if (elem == 0) checkError('theme', 'Укажите тему сообщения');
         }

      if (check)
         {
         title = '"Контактное лицо"';
         elem = document.preview.name.value;
         if (elem.length == 0) checkError('name', dutyField + title);
         else if (text(elem)) checkError('name', wrongField + title);
         }

      if (check)
         {
         title = '"E-mail"';
         elem = document.preview.email.value;
         if (elem.length == 0) checkError('email', dutyField + title);
         else if (!mail(elem)) checkError('email', wrongField + title);
         }

      if (check)
         {
         title = '"Телефон"';
         elem = document.preview.phone.value;
         if (elem.length == 0) checkError('phone', dutyField + title);
         else if (!numeric(elem)) checkError('phone', wrongField + title);
         }

      if (check)
         {
         elem = document.preview.agree.checked;
         if (!elem) checkError('agree', 'Вы должны принять условия');
         }

      if (check)  { document.preview.submit(); }

      return check;
      }
</script>