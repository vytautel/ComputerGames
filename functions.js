function tableSort(n, numerical) {
  var table,
    rows,
    switching,
    i,
    x,
    y,
    shouldSwitch,
    dir,
    switchcount = 0
  table = document.getElementById('sortableTable')
  switching = true

  header = document.getElementsByTagName('TH')[n]
  // Set the sorting direction to ascending:
  var dir = $(header).hasClass('asc') ? 'desc' : 'asc'
  $(header).removeClass('asc').removeClass('desc')
  $(header).addClass(dir)

  while (switching) {
    switching = false
    rows = table.rows

    for (i = 1; i < rows.length - 1; i++) {
      shouldSwitch = false
      x = rows[i].getElementsByTagName('TD')[n]
      y = rows[i + 1].getElementsByTagName('TD')[n]

      if (dir == 'asc') {
        if (numerical) {
          if (Number(x.innerHTML) > Number(y.innerHTML)) {
            shouldSwitch = true
            break
          }
        } else if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true
          break
        }
      } else if (dir == 'desc') {
        if (numerical) {
          if (Number(x.innerHTML) < Number(y.innerHTML)) {
            shouldSwitch = true
            break
          }
        } else if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true
          break
        }
      }
    }

    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i])
      switching = true
      switchcount++
    } /*else {
      if (switchcount == 0 && dir == 'asc') {
        dir = 'desc'
        switching = true
      }
    }*/
  }
}
