console.clear();

var $, anime;
var date = new Date();

console.log(`Updated: ${date}`);

var getContacts = () => {
  let contacts = [];
  let ce = $('.contact-info .contact');
  for(let i = 0; i < ce.length; i++) {
    let type = $(ce[i]).data("type");
    contacts[i] = {
      type: type,
      contact: type == "discord" ? `${$(ce[i]).find('.discord .username input').val()}#${$(ce[i]).find('.discord .tag input').val()}` : $(ce[i]).find(".form-group input").val()
    };
  }
  return contacts;
};

var group = (group) => {
  return $(`.form-group.${group} input`);
};

var format = {
  name: (name) => {
    return name.replace(/[^a-zA-Z ,.'-]+/g, '');
  },
  mailName: (name) => {
    return name.toLowerCase().replace(/[^a-z]/, '');
  },
  number: (num) => {
    return num.toString().replace(/[^0-9]/g, '');
  },
  phone: (number) => {
    var cleaned = ("" + number).replace(/\D/g, '');
    var match = cleaned.match(/^(\d*)(\d{3})(\d{3})(\d{4})$/);
    return (!match) ? cleaned : `${match[1] != '' ? `+${match[1]} ` : ''}(${match[2]}) ${match[3]}-${match[4]}`;
  }
};

var add = {
  contactInfo: (str, type) => {
    $('.contact-info').append(`<div class="contact" data-type="${type}"><i class='fa fa-trash'></i>${str}</div>`);
  }
};

var get = {
  schoolEmail: () => {
    return `${format.mailName(group('first').val())}.${format.mailName(group('last').val())}${format.number(date.getFullYear() % 100 + Number(date.getMonth() > 6) + 12 - Number($('.form-group.grade select option:selected').text()))}@auhsdschools.org`;
  }
};

$('.form-group.first input, .form-group.last input, .form-group.grade').on('input', (e) => {
  $('.form-group.school-email span.email').text(`${get.schoolEmail()}`);
  $('.form-group.school-email p').css('display', 'inline-block');
}); 

$('.form-group.first input, .form-group.last input').on('input', (e) => {
  e.target.value = format.name(e.target.value);
});

$('.form-group.school-email p i').click(() => {
  $('.form-group.school-email p').css('display', 'none');
});

$('.form-group.school-email p span').click(() => {
  $('.form-group.school-email').html(`<input type="text" class="school-email" value="${get.schoolEmail()}" required="required"/><label for="input" class="control-label">School Email</label>
<i class="bar"></i>`);
  $('.form-group.school-email input').select();
  $('.form-group.school-email label').addClass('in');
});


var clickTrash = () => {
  $('.contact-info .contact i.fa-trash').click((e) => {
    e.target.parentElement.parentElement.removeChild(e.target.parentElement);
   });
};

$('.add-contact .tl').click(() => {
  console.log('tl');
  add.contactInfo(`<div class="form-group email">
      <input type="text" required/><label for="input" class="control-label">Email</label>
      <i class="bar"></i>
    </div>`, "email");
  clickTrash();
});
$('.add-contact .tr').click(() => {
  console.log('tr');
  add.contactInfo(`<div class="form-group phone">
      <input type="text" required/><label for="input" class="control-label">Phone #</label>
      <i class="bar"></i>
    </div>`, "phone");
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
    </div>`, "git");
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
    </div>`, "discord");
  clickTrash();
  $('.side.discord .form-group.tag input').on('input', (e) => {
    e.target.value = format.number(e.target.value).slice(0,4);
  });
});



var basicTimeline = anime.timeline({
  autoplay: false
});

var checkTimeline = anime.timeline({
  autoplay: false
});

var containerTimeline = anime.timeline({
  autoplay: false
})

var pathEls = $("#submit-check");
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
  });


var btnSubmit = $(".submit-button .submit-btn, .submit-button .submit-text, .submit-button .check-svg");
console.log(document.querySelector('input.school-email'));

btnSubmit.click(function(e) {
  var contacts = getContacts();
  $('input').on('change', () => {
    checkError();
  })
  if(checkError()) {
    btnSubmit.css("pointer-events", "none");
    console.log(`text: ${$('.form-group.school-email span.email').text()}`);
    basicTimeline.play();
    
    setTimeout(() => {
      reset();
    }, 5000);
    console.log();
    $.ajax({
      url: 'signup.php',
      type: 'POST',
      data: {
        firstname: $('input.firstname').val(),
        lastname: $('input.lastname').val(),
        age: $('input.age').val(),
        grade: $('select.grade').val(),
        schoolEmail: document.querySelector('input.school-email') ? $('input.school-email').val() : $('.form-group.school-email span.email').text(),
        contact: contacts,
        PiE: +$('.checkbox.pie input').is(':checked'),
        gameDev: +$('.checkbox.gamedev input').is(':checked'),
        CS: +$('.checkbox.cs input').is(':checked'),
        maker:  +$('.checkbox.maker input').is(':checked'),
        additionalInfo: $('textarea.a-info').val()
      },
      success: function(msg) {
        $('#counter').html(`Number of Signups: ${msg}`);
        
        // setTimeout(() => {checkTimeline.play()}, 3500);
      },
      error: (e) => {
        console.log('error: ');
        console.log(e);
      }
    });
  }
  function reset() {
      btnSubmit.css("pointer-events", "");
      $('.contact-info').html('');
      $('#form').trigger('reset');
      $('container').css({
        "transform": "translateX(100px)"
      });
      $('.form-group.school-email label').removeClass('in');
      $('.form-group.school-email').html(`<label>School Email: <span class="email" name="school-emailin"></span></label>
        <p><span>Change</span></p>`);
      basicTimeline.restart();
      basicTimeline.pause();
      $('.form-group.school-email p span').click(() => {
        $('.form-group.school-email').html(`<input type="text" class="school-email" value="${get.schoolEmail()}" required="required"/><label for="input" class="control-label">School Email</label>
      <i class="bar"></i>`);
        $('.form-group.school-email input').select();
        $('.form-group.school-email label').addClass('in');
      });
      $('.has-error').removeClass('has-error');
      $('html,body').animate({ scrollTop: 0 }, 'slow');
  }
  function checkError() {
    var valid = true;
    var ins = ['firstname', 'lastname', 'age'];
    for(let i of ins) {
      if(!$(`input.${i}`).val()) {
        valid = false;
        $(`input.${i}`).parent().addClass('has-error');
      } else {
        $(`input.${i}`).parent().removeClass('has-error');
      }
    }
    if($('input.school-email').length && !$('input.school-email').val()) {
      valid = false;
      $(`input.school-email`).parent().addClass('has-error');
    } else {
      $(`input.school-email`).parent().removeClass('has-error');
    }
    if($(`select.grade`).val() == 'Select') {
      valid = false;
      $(`select.grade`).parent().addClass('has-error');
    } else {
      $(`select.grade`).parent().removeClass('has-error');
    }
    console.log(!contacts.length);
    if(!contacts.length) {
      valid = false;
      $('#error').css('display', 'block');
    } else {
      $('#error').css('display', 'none');
      for(let i in contacts) {
        if(!contacts[i].contact) {
          valid = false;
          $($('.contact-info .contact')[i]).find('.form-group').addClass('has-error');
        } else {
          $($('.contact-info .contact')[i]).find('.form-group').removeClass('has-error');
        }
      }
    }
    return valid;
  }
});
