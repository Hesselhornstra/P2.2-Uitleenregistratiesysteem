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
function account(welke){
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