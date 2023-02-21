/* VIDEO MODAL */
const playBtns = document.querySelectorAll('.play');
for (let i = 0; i < playBtns.length; i++) {
  playBtns[i].addEventListener('click', () => {
    videoContainer.classList.add('show');
  });
}

const videoContainer = document.querySelector('.video-container'),
previewVideo = videoContainer.querySelector("video"),
close = document.querySelector('.video-container .close');

const getVideos = document.querySelectorAll(".video");
for (let i = 0; i < getVideos.length; i++) {
  getVideos[i].setAttribute("onclick", "showVideo(this)");
}

function showVideo(element){
  document.querySelector("body").style.overflow = "hidden";
  let selectedPrevVideo = element.querySelector("video").src;
  let selectedVideoPoster = element.querySelector("video").poster;
  previewVideo.src = selectedPrevVideo;
  previewVideo.poster = selectedVideoPoster;
  previewVideo.muted = false;
  close.onclick = ()=>{
    videoContainer.classList.remove('show');
      previewVideo.muted = true;
    document.querySelector("body").style.overflow = "auto";
  }
}
