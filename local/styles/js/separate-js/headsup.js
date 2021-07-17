export default ({
    selector = 'header',
    duration = 0.3,
    easing = 'ease',
    delay = 0,
    debounce = false
  } = {}) => {

  let show = true
  let prev = window.pageYOffset

  const header = document.querySelector(selector)
  const styles = window.getComputedStyle(header)

  const headerHeight = () => {
    const widthAndPadding = header.getBoundingClientRect().height
    const marginTop = parseFloat(styles['margin-top'])
    const marginBot = parseFloat(styles['margin-bottom'])
    const boxShadow = 20;

    return widthAndPadding + marginTop + marginBot + boxShadow
  }

  const fixedShow = () => {
    header
      .style
      .top = '0'

    show = true
  }

  const fixedHide = () => {
    header
      .style
      .top = `-${headerHeight()}px`

    show = false
  }

  const onScrollFunction = _ => {
    const current = window.pageYOffset

    current > prev && current >= (headerHeight() / 2)
      ? show ? fixedHide() : null
      : show ? null : fixedShow()

    prev = current
  }

  const debounceFunc = wait => {
    if (!wait) return onScrollFunction

    let timeout = null
    return () => {
      if (!timeout) {
        timeout = setTimeout(() => {
          onScrollFunction()
          timeout = null
        }, wait)
      }
    }
  }

  Object.assign(header.style, {
    position: 'fixed',
    top: '0',
    transition: `top ${duration}s ${easing} ${delay}s`
  })

  window.addEventListener('scroll', debounceFunc(debounce))
}
