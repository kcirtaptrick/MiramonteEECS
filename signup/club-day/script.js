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
  $('.form-group.school-email label').css('color', '#808080');
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
  });

containerTimeline
  .add({
    targets: ".container",
    duration: 1000,
    transform: "translateX(100vw)"
  })


var btnSubmit = $(".submit-button .submit-btn, .submit-button .submit-text, .submit-button .check-svg");
console.log(document.querySelector('input.school-email'));

btnSubmit.click(function(e) {
  btnSubmit.css("pointer-events", "none");
  console.log(`text: ${$('.form-group.school-email span.email').text()}`);
  basicTimeline.play();
  
  setTimeout(() => {
    btnSubmit.css("pointer-events", "");
    $('.contact-info').html('');
    $('#form').trigger('reset');
    $('container').css({
      "transform": "translateX(100px)"
    });
  }, 5000);
  
  $.ajax({
    url: 'signup.php',
    type: 'POST',
    data: {
      firstname: $('input.firstname').val(),
      lastname: $('input.lastname').val(),
      grade: $('select.grade').val(),
      schoolEmail: document.querySelector('input.school-email') ? $('input.school-email').val() : $('.form-group.school-email span.email').text(),
      contact: getContacts(),
      PiE: +$('.checkbox.pie input').is(':checked'),
      gameDev: +$('.checkbox.gamedev input').is(':checked'),
      CS: +$('.checkbox.cs input').is(':checked'),
      maker:  +$('.checkbox.maker input').is(':checked'),
      additionalInfo: $('textarea.a-info').val()
    },
    success: function(msg) {
      console.log(`success: ${msg}`);
      $('.container').append(`<div style="margin-top: 10rem">${msg}</div>`);
      
      // setTimeout(() => {checkTimeline.play()}, 3500);
    },
    error: (e) => {
      console.log('error: ');
      console.log(e);
    }
  });
});
