
console.clear();
var $;
var date = new Date();
var contacts = [];
var updateContacts = () => {
  var ce= $('.contact-info .contacts');
  for(var i in ce) {
    contacts[i] = {
      type: "",
      contact: ""
    }
  }
}
var group = (group) => {
  return $(`.form-group.${group} input`);
}
var format = {
  name: (name) => {
    return name.toLowerCase().replace(/[^a-z]/gi, '')
  },
  grade: (grade) => {
    return grade.toString().replace(/[^0-9]/g, '')
  },
  phone: (number) => {
    var cleaned = ("" + number).replace(/\D/g, '');
    var match = cleaned.match(/^(\d*)(\d{3})(\d{3})(\d{4})$/);
    return (!match) ? cleaned : `${match[1] != '' ? `+${match[1]} ` : ''}(${match[2]}) ${match[3]}-${match[4]}`;
  }
}
var add = {
  contactInfo: (str) => {
    $('.contact-info').append(`<div class="contact"><i class='fa fa-trash'></i>${str}</div>`)
  }
}
// console.log(document.querySelector('.container *').reduce((acc, curr) => acc + curr.height));
// console.log($('.container *').toArray().reduce((acc, curr) => acc + curr.outerHeight(true)))
// $('.container').height($('.container *').reduce((acc, curr) => acc + curr.outerHeight(true)))
var get = {
  schoolEmail: () => {
    return `${format.name(group('first').val())}.${group('last').val().toLowerCase()}${format.grade(date.getFullYear() % 100 + Number(date.getMonth() > 6) + 12 - Number($('.form-group.grade select option:selected').text()))}@auhsdschools.org`;
  }
}
$('.form-group.first input, .form-group.last input, .form-group.grade').on('input', () => {
  $('.form-group.school-email span.email').text(`${get.schoolEmail()}`);
    $('.form-group.school-email p').css('display', 'inline-block');
}); 
$('.contact-info .contact .form-group input, .contact-info .contact .form-group side input').on('input', (e) => {
  console.log(e);
  
})
$('.form-group.school-email p i').click(() => {
  $('.form-group.school-email p').css('display', 'none');
})
$('.form-group.school-email p span').click(() => {
  $('.form-group.school-email').html(`<input type="text" class="school-email" value="${get.schoolEmail()}" required="required"/><label for="input" class="control-label">School Email</label>
<i class="bar"></i>`);
  $('.form-group.school-email input').select();
  $('.form-group.school-email label').css('color', '#808080');
})
var clickTrash = () => {
  $('.contact-info .contact i.fa-trash').click((e) => {
    e.target.parentElement.parentElement.removeChild(e.target.parentElement);
   });
}


$('.add-contact .tl').click(() => {
  console.log('tl');
  add.contactInfo(`<div class="form-group email">
      <input type="text" required/><label for="input" class="control-label">Email</label>
      <i class="bar"></i>
    </div>`);
  clickTrash();
});
$('.add-contact .tr').click(() => {
  console.log('tr');
  add.contactInfo(`<div class="form-group phone">
      <input type="text" required/><label for="input" class="control-label">Phone #</label>
      <i class="bar"></i>
    </div>`);
  clickTrash();
  $('.form-group.phone input').on('input', (e) => {
    e.target.value = format.phone(e.target.value);
  })
});
$('.add-contact .bl').click(() => {
  console.log('bl');
  add.contactInfo(`<div class="form-group git">
      <input type="text" required/><label for="input" class="control-label">Git URL, example https://github.com/username</label>
      <i class="bar"></i>
    </div>`);
  clickTrash();
});
$('.add-contact .br').click(() => {
  console.log('br');
  add.contactInfo(`<div class="side discord">
      <div class="form-group username"> 
        <input type="text" required/><label for="input" class="control-label">Discord Username</label>
        <i class="bar"></i>
      </div>
      #
      <div class="form-group tag">
        <input type="text" required/><label for="input" class="control-label">Tag</label>
        <i class="bar"></i>
      </div>
    </div>`);
  clickTrash();
  $('.side.discord .form-group.tag input').on('input', (e) => {
    e.target.value = e.target.value.slice(0,4);
  });
});
















var basicTimeline = anime.timeline({
  autoplay: false
});
var checkTimeline = anime.timeline({
  autoplay: false
})

var pathEls = $(".submit-button .submit-check");
for (var i = 0; i < pathEls.length; i++) {
  var pathEl = pathEls[i];
  var offset = anime.setDashoffset(pathEl);
  pathEl.setAttribute("stroke-dashoffset", offset);
}

basicTimeline
  .add({
    targets: ".submit-button .submit-text",
    duration: 1,
    opacity: "0"
  })
  .add({
    targets: ".submit-button .submit-btn",
    duration: 1300,
    height: 10,
    width: 300,
    backgroundColor: "#fff",
    border: "1px solid #0af",
    borderRadius: 100
  })
  .add({
    targets: ".submit-button .submit-progress-bar",
    duration: 2000,
    width: 300,
    easing: "linear"
  })
  .add({
    targets: ".submit-button .submit-btn",
    width: 0,
    duration: 1
  })
  .add({
    targets: ".submit-button .submit-progress-bar",
    width: 80,
    height: 80,
    delay: 500,
    duration: 750,
    borderRadius: 80,
    backgroundColor: "#0af"
  })
  .add({
    targets: pathEl,
    strokeDashoffset: [offset, 0],
    duration: 200,
    easing: "easeInOutSine"
  });;

var btnSubmit = $(".submit-button .submit-btn, .submit-button .submit-text, .submit-button .check-svg");
console.log(document.querySelector('input.school-email'));

btnSubmit.click(function(e) {
  btnSubmit.css("pointer-events", "none")
  setTimeout(() => {btnSubmit.css("pointer-events", "")}, 5000);
  console.log(`text: ${$('.form-group.school-email span.email').text()}`);
  basicTimeline.play();
  $.ajax({
    url: 'signup.php',
    type: 'POST',
    data: {
      firstname: $('input.firstname').val(),
      lastname: $('input.lastname').val(),
      grade: $('select.grade').val(),
      schoolEmail: document.querySelector('input.school-email') ? $('input.school-email').val() : $('.form-group.school-email span.email').text(),
      contact: [{
        type: 'email',
        contact: 'test3'
      }],
      PiE: 0,
      gameDev: 1,
      additionalInfo: $('textarea.a-info').val()
    },
    success: function(msg) {
      console.log(`success: ${msg}`);
      $('.container').append(`<div style="margin-top: 10rem">${msg}</div>`);
      
      setTimeout(() => {checkTimeline.play()}, 3500);
    },
    error: (e) => {
      console.log('error: ');
      console.log(e);
    }
  });
  // $('#form').submit();
  setTimeout(() => {
    $('#form').trigger('reset');
    
  }, 5000);
}); 

console.log("hello"); 