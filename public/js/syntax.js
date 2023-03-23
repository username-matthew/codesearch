// const
document.body.innerHTML = document.body.innerHTML.replace(/const/g, '<span class="const">const</span>')
// let
document.body.innerHTML = document.body.innerHTML.replace(/let/g, '<span class="let">let</span>')

// console.log
document.body.innerHTML = document.body.innerHTML.replace(/console.log/g, '<span class="consolelog">console.log</span>')
// comments 
document.body.innerHTML = document.body.innerHTML.replace(/\/\//g, '<span class="comment">//</span>')

// function
document.body.innerHTML = document.body.innerHTML.replace(/function/g, '<span class="function">function</span>')
// return
document.body.innerHTML = document.body.innerHTML.replace(/return/g, '<span class="return">return</span>')

// this
document.body.innerHTML = document.body.innerHTML.replace(/this/g, '<span class="this">this</span>')

// class
// function replace(element, from, to) {
//   if (element.childNodes.length) {
//     element.childNodes.forEach(
//       child => replace(child, from, to)
//     )
//   } else {
//     const cont = element.textContent
//     if (cont) element.textContent = cont.replace(from, to)
//   }
// }
// replace(document.body, new RegExp("class", "g"), "ZZZ")
// document.body.innerHTML = document.body.innerHTML.replace(/ZZZ/g, '<span class="classy">class</span>')

// array bracket open
document.body.innerHTML = document.body.innerHTML.replace(/\[/g, '<span class="array">[</span>')
// array bracket close
document.body.innerHTML = document.body.innerHTML.replace(/\]/g, '<span class="array">]</span>')

// object curly braces open
document.body.innerHTML = document.body.innerHTML.replace(/\{/g, '<span class="object">{</span>')
// object curly braces close
document.body.innerHTML = document.body.innerHTML.replace(/\}/g, '<span class="object">}</span>')