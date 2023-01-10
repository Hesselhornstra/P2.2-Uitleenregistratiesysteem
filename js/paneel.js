function artikelen(welke){
    if (welke === "telaat"){
        document.getElementById('telaat').style.display = 'block'
        document.getElementById('vandag').style.display = 'none'
        document.getElementById('moment').style.display = 'none'
    }else if (welke == "vandag"){
        document.getElementById('telaat').style.display = 'none'
        document.getElementById('vandag').style.display = 'block'
        document.getElementById('moment').style.display = 'none'
    }else if (welke == "moment"){
        document.getElementById('telaat').style.display = 'none'
        document.getElementById('vandag').style.display = 'none'
        document.getElementById('moment').style.display = 'block'
    }
}
function artikel(welke){
    if (welke === "toe"){
        document.getElementById('toe').style.display = 'block'
        document.getElementById('wij').style.display = 'none'
        document.getElementById('ver').style.display = 'none'
    }else if (welke == "wij"){
        document.getElementById('toe').style.display = 'none'
        document.getElementById('wij').style.display = 'block'
        document.getElementById('ver').style.display = 'none'
    }else if (welke == "ver"){
        document.getElementById('toe').style.display = 'none'
        document.getElementById('wij').style.display = 'none'
        document.getElementById('ver').style.display = 'block'
    }
}
function categorie(welke){
    if (welke === "ctoe"){
        document.getElementById('ctoe').style.display = 'block'
        document.getElementById('cwij').style.display = 'none'
        document.getElementById('cver').style.display = 'none'
    }else if (welke == "cwij"){
        document.getElementById('ctoe').style.display = 'none'
        document.getElementById('cwij').style.display = 'block'
        document.getElementById('cver').style.display = 'none'
    }else if (welke == "cver"){
        document.getElementById('ctoe').style.display = 'none'
        document.getElementById('cwij').style.display = 'none'
        document.getElementById('cver').style.display = 'block'
    }
}
function catcat(welke) {
    if (welke === "cattoe") {
        document.getElementById('cattoe').style.display = 'block'
        document.getElementById('catwij').style.display = 'none'
        document.getElementById('catver').style.display = 'none'
    } else if (welke == "catwij") {
        document.getElementById('cattoe').style.display = 'none'
        document.getElementById('catwij').style.display = 'block'
        document.getElementById('catver').style.display = 'none'
    } else if (welke == "catver") {
        document.getElementById('cattoe').style.display = 'none'
        document.getElementById('catwij').style.display = 'none'
        document.getElementById('catver').style.display = 'block'
    }
}
function account(welke) { 
    if (welke === "atoe"){
        document.getElementById('atoe').style.display = 'block'
        document.getElementById('aaan').style.display = 'none'
        document.getElementById('aver').style.display = 'none'
    }else if (welke == "aaan"){
        document.getElementById('atoe').style.display = 'none'
        document.getElementById('aaan').style.display = 'block'
        document.getElementById('aver').style.display = 'none'
    }else if (welke == "aver"){
        document.getElementById('atoe').style.display = 'none'
        document.getElementById('aaan').style.display = 'none'
        document.getElementById('aver').style.display = 'block'
    } 
}