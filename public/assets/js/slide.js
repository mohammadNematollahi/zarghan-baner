const slide = document.getElementById("slide");

function prev() {
  return (slide.scrollLeft -= 550);
}

function next() {
  return (slide.scrollLeft += 550);
}


