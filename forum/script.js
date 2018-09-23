var escapeStr = {
  html: (str) => {
    return str.replace('&', '&amp;').replace('<', '&lt;').replace('>', '&gt;').replace('"', '&quot;').replace("'", '&apos;');
  }
}
var rootDir = '/'
var data = [{
  "username": "patrickwang3",
  "datetime": "16-8-2018/4:41",
  "note": "(edited)",
  "content": "This is a comment",
  "likes": 10,
  "dislikes": 5,
  "replies": [{
    "username": "Other_User",
    "datetime": "16-8-2018/5:01",
    "note": "",
    "content": "This is a reply",
    "likes": 5,
    "dislikes": 10
  }, {
    "username": "Other_User2",
    "datetime": "16-8-2018/10:24",
    "note": "(edited)",
    "content": "This is another reply ",
    "likes": 1,
    "dislikes": 1,
    "replies": [{
      "username": "Other_User3",
      "datetime": "17-8-2018/11:08",
      "note": "(edited)",
      "content": "This is a reply to a reply",
      "likes": 0,
      "dislikes": 0
    }]
  }, {
    "username": "Other_User",
    "datetime": "16-8-2018/5:01",
    "note": "",
    "content": "This is a reply",
    "likes": 5,
    "dislikes": 10
  }]
}, {
  "username": "secondComment",
  "datetime": "17-8-2018/7:18",
  "note": "",
  "content": "This is another comment",
  "likes": 10,
  "dislikes": 5,
  "replies": [{
    "username": "Second_Other_User",
    "datetime": "17-8-2018/7:21",
    "note": "(edited)",
    "content": "This is a reply",
    "likes": 5,
    "dislikes": 10
  }, {
    "username": "Second_Other_User2",
    "datetime": "17-8-2018/7:22",
    "note": "edited",
    "content": "This is another reply",
    "likes": 1,
    "dislikes": 1
  }]
}, {
  "username": "longComment",
  "datetime": "18-8-2018/1:46",
  "note": "",
  "content": "This is a really really really really really really really really really really really really really really really really really really really really really really really really really really really really really really really long comment",
  "likes": 10,
  "dislikes": 5
}];
function replacer(match, p1, p2, p3, p4, p5, p6, offset, string) {
  return `<div class="comment"><header><a href="${rootDir}u/${p1}">${escapeStr.html(p1)}</a><p>${p2} ${p3}</p></header><div class="content">${escapeStr.html(p4)}</div><div class="rating">Points: ${p5 - p6}</div>`;
}
document.querySelector('.comments').innerHTML = JSON.stringify(data, null, ' ').replace(/{\s*"username": "(.*)",\s*"datetime": "(.*)",\s*"note": "(.*)",\s*"content": "(.*)",\s*"likes": ([0-9]*),\s*"dislikes": ([0-9]*),?/g, replacer).replace(/},?|],?/g, '</div>').replace(/"replies": \[/g, '<div class="replies">').replace('[', '<div class="list">')