<?php
$json_url = file_get_contents("http://localhost/islem.php");
$data = json_decode($json_url,true);

 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>BTC - ETH - USDT Detaylı Veri | Umut Can Arda</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet"><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <style media="screen">
  body {
    overflow: hidden;
  }
  body h1, body h2, body h3, body div {
    color: #3c3c3c;
    font-family: "Roboto", sans-serif;
    margin: 0px;
  }

  body, html, #root, #app {
    height: 100%;
    margin: 0px;
    padding: 0px;
    width: 100%;
  }

  .scroll-bar::-webkit-scrollbar {
    height: 0px;
    width: 0px;
  }
  .scroll-bar::-webkit-scrollbar-thumb {
    background-color: #f0f0f0;
  }

  #app.updating #card-wrapper #card #card-left #coin-symbol-vert {
    opacity: 0;
    transform: rotate(-90deg) translateY(20px);
  }
  #app.updating #card-wrapper #card #card-right #card-right-contents #coin-header, #app.updating #card-wrapper #card #card-right #card-right-contents #coin-price, #app.updating #card-wrapper #card #card-right #card-right-contents #coin-info {
    opacity: 0;
    transform: translateY(20px);
  }
  #app.updating #card-wrapper #card #card-right #card-right-contents #card-right-stripes {
    opacity: 0;
    transform: translateX(100%) translateY(100%);
  }
  #app #particles {
    height: 100%;
    left: 0px;
    position: fixed;
    top: 0px;
    width: 100%;
    z-index: 1;
  }
  #app #help-tooltip {
    bottom: 10px;
    left: 10px;
    position: fixed;
    transition: all 0.4s;
    z-index: 4;
  }
  #app #help-tooltip.hide {
    opacity: 0;
  }
  #app #help-tooltip i {
    font-size: 2em;
    height: 50px;
    line-height: 50px;
    text-align: center;
    vertical-align: top;
    width: 50px;
  }
  #app #help-tooltip h1 {
    animation: bounce-tooltip 3s ease-in-out infinite;
    display: inline-block;
    font-size: 1em;
    position: relative;
  }
  #app #help-tooltip h1 .text {
    background-color: white;
    border-radius: 2px;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 6px, rgba(0, 0, 0, 0.12) 0px 1px 4px;
    display: inline-block;
    height: 40px;
    font-size: 1em;
    font-weight: 100;
    line-height: 40px;
    margin: 5px 0px;
    margin-left: 10px;
    padding: 0px 15px;
    position: relative;
    vertical-align: top;
    z-index: 2;
  }
  #app #help-tooltip h1:before, #app #help-tooltip h1 .triangle {
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 6px, rgba(0, 0, 0, 0.12) 0px 1px 4px;
    display: inline-block;
    height: 20px;
    left: 0px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    width: 20px;
    z-index: 1;
  }
  #app #help-tooltip h1:before {
    box-shadow: none;
    content: "";
    z-index: 3;
  }
  #app #card-loading {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    height: 300px;
    width: 300px;
    z-index: 3;
  }
  #app #card-loading #card-loading-spinner {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    height: 150px;
    width: 150px;
  }
  #app #card-loading #card-loading-spinner:before, #app #card-loading #card-loading-spinner:after {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    content: "";
  }
  #app #card-loading #card-loading-spinner:before {
    animation: rotate 3s linear infinite;
    border-bottom: 1px solid transparent;
    border-left: 1px solid #4fc3f7;
    border-right: 1px solid #4fc3f7;
    border-top: 1px solid transparent;
    border-radius: 1000px;
    height: 150px;
    width: 150px;
  }
  #app #card-loading #card-loading-spinner:after {
    animation: rotate-reverse 3s linear infinite;
    border-bottom: 1px solid #c8c8c8;
    border-left: 1px solid transparent;
    border-right: 1px solid transparent;
    border-top: 1px solid #c8c8c8;
    border-radius: 1000px;
    height: 120px;
    width: 120px;
  }
  #app #card-wrapper {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    height: calc(100% - 40px);
    pointer-events: none;
    width: calc(100% - 40px);
    z-index: 3;
  }
  #app #card-wrapper.orange #card #card-left {
    background-image: linear-gradient(45deg, #ffeb3b, #ff9800);
  }
  #app #card-wrapper.orange #card #card-right #card-right-contents #coin-header #coin-symbol h1 {
    color: #ff9800;
  }
  #app #card-wrapper.orange #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    color: #ff9800;
  }
  #app #card-wrapper #card {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    animation: fade-in-up 1s ease-in-out;
    font-size: 0px;
    height: 400px;
    pointer-events: initial;
    width: 647px;
  }
  #app #card-wrapper #card .card-half {
    background-color: white;
    display: inline-block;
    height: 100%;
    position: relative;
    vertical-align: top;
    width: 50%;
  }
  #app #card-wrapper #card #card-left {
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 30px, rgba(0, 0, 0, 0.23) 0px 6px 10px;
    z-index: 1;
  }
  #app #card-wrapper #card #card-left:hover #coin-selection {
    opacity: 1;
    pointer-events: initial;
  }
  #app #card-wrapper #card #card-left:hover #coin-selection #coin-options-wrapper #coin-options .coin-option .coin-option-icon {
    transform: scale(0.7);
  }
  #app #card-wrapper #card #card-left:hover #coin-icon {
    opacity: 0;
  }
  #app #card-wrapper #card #card-left #coin-icon {
    background-color: white;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 1000px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 30px, rgba(0, 0, 0, 0.23) 0px 6px 10px;
    height: 260px;
    left: 0px;
    position: absolute;
    top: 50%;
    transform: translateX(-40px) translateY(-50%);
    transition: all 0.2s;
    width: 260px;
    z-index: 2;
  }
  #app #card-wrapper #card #card-left #coin-symbol-vert {
    bottom: 100px;
    height: 120px;
    margin: 10px;
    position: absolute;
    right: -100px;
    transform: rotate(-90deg);
    transition: all 0.2s;
    width: 320px;
  }
  #app #card-wrapper #card #card-left #coin-symbol-vert h1 {
    color: rgba(255, 255, 255, 0.2);
    font-size: 150px;
    font-weight: 700;
    height: 120px;
    line-height: 120px;
    margin: 0px;
  }
  #app #card-wrapper #card #card-left #coin-selection {
    height: 100vh;
    left: 0px;
    margin-left: -60px;
    opacity: 0;
    pointer-events: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: all 0.2s;
    width: calc(100% + 60px);
    z-index: 3;
  }
  #app #card-wrapper #card #card-left #coin-selection:before, #app #card-wrapper #card #card-left #coin-selection:after {
    height: 15vh;
    content: "";
    left: 0px;
    position: absolute;
    width: 100%;
    z-index: 2;
  }
  #app #card-wrapper #card #card-left #coin-selection:before {
    background: linear-gradient(to bottom, white, transparent);
    top: 0px;
  }
  #app #card-wrapper #card #card-left #coin-selection:after {
    background: linear-gradient(to top, white, transparent);
    bottom: 0px;
  }
  #app #card-wrapper #card #card-left #coin-selection #coin-options-wrapper {
    height: 100%;
    overflow: auto;
    width: 100%;
  }
  #app #card-wrapper #card #card-left #coin-selection #coin-options-wrapper #coin-options {
    margin: calc(50vh - 130px) 0px;
    padding-left: 20px;
    position: relative;
    z-index: 1;
  }
  #app #card-wrapper #card #card-left #coin-selection #coin-options-wrapper #coin-options .coin-option {
    margin-bottom: 20px;
    position: relative;
  }
  #app #card-wrapper #card #card-left #coin-selection #coin-options-wrapper #coin-options .coin-option.selected .coin-option-icon {
    opacity: 1;
    transform: scale(1);
  }
  #app #card-wrapper #card #card-left #coin-selection #coin-options-wrapper #coin-options .coin-option .coin-option-icon {
    background-color: white;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 1000px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 30px, rgba(0, 0, 0, 0.23) 0px 6px 10px;
    height: 260px;
    opacity: 0.8;
    transform: scale(0.2);
    transition: all 0.2s;
    width: 260px;
  }
  #app #card-wrapper #card #card-right {
    z-index: 2;
  }
  #app #card-wrapper #card #card-right #card-right-contents {
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 30px, rgba(0, 0, 0, 0.23) 0px 6px 10px;
    height: 460px;
    margin-top: -30px;
    overflow: hidden;
    position: relative;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header {
    border-bottom: 1px solid #f0f0f0;
    margin: 20px;
    margin-bottom: 10px;
    padding-bottom: 10px;
    position: relative;
    transition: all 0.2s;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-name h1 {
    font-size: 30px;
    font-weight: 100;
    text-transform: uppercase;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-symbol h1 {
    color: #c8c8c8;
    font-size: 15px;
    font-weight: 300;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank {
    backface-visibility: hidden;
    display: inline-block;
    position: absolute;
    right: 0px;
    top: 0px;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .label, #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .value {
    display: inline-block;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .label h1, #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    font-size: 20px;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .label h1 {
    color: #c8c8c8;
    font-weight: 400;
    text-transform: uppercase;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .value {
    margin-left: 6px;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    font-weight: 100;
    font-size: 2;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price {
    backface-visibility: hidden;
    margin: 20px;
    margin-top: 0px;
    transition: all 0.2s;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price .value {
    display: inline-block;
    vertical-align: top;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price .value h1 {
    font-size: 40px;
    font-weight: 100;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price #coin-change-24hr {
    display: inline-block;
    margin: 5px;
    vertical-align: top;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price #coin-change-24hr.positive h1 {
    color: #66bb6a;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price #coin-change-24hr.negative h1 {
    color: #d32f2f;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-price #coin-change-24hr h1 {
    color: #3c3c3c;
    font-size: 20px;
    font-weight: 100;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-info {
    margin: 20px;
    transition: all 0.2s;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-info .coin-info-field {
    margin-top: 20px;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-info .coin-info-field .value h1 {
    font-size: 20px;
    font-weight: 300;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-info .coin-info-field .label {
    margin-top: 4px;
  }
  #app #card-wrapper #card #card-right #card-right-contents #coin-info .coin-info-field .label h1 {
    color: #c8c8c8;
    font-size: 12px;
    font-weight: 400;
    text-transform: uppercase;
  }
  #app #card-wrapper #card #card-right #card-right-contents #card-right-stripes {
    bottom: 0px;
    height: 50px;
    right: 0px;
    position: absolute;
    transition: all 0.2s;
    width: 50px;
  }
  #app #card-wrapper #card #card-right #card-right-contents #card-right-stripes:before, #app #card-wrapper #card #card-right #card-right-contents #card-right-stripes:after {
    background-color: red;
    content: "";
    height: 200px;
    position: absolute;
  }
  #app #card-wrapper #card #card-right #card-right-contents #card-right-stripes:after {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 10px, rgba(0, 0, 0, 0.23) 0px 3px 10px;
    left: 0px;
    top: -70px;
    transform: rotate(45deg);
    width: 80px;
  }
  #app #card-wrapper.orange #card #card-left {
    background-image: linear-gradient(45deg, #ffeb3b, #ff9800);
  }
  #app #card-wrapper.orange #card #card-right #card-right-contents #coin-header #coin-symbol h1 {
    color: #ff9800;
  }
  #app #card-wrapper.orange #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    color: #ff9800;
  }
  #app #card-wrapper.orange #card #card-right #card-right-contents #card-right-stripes:before, #app #card-wrapper.orange #card #card-right #card-right-contents #card-right-stripes:after {
    background-color: #ff9800;
  }
  #app #card-wrapper.blue #card #card-left {
    background-image: linear-gradient(45deg, #4fc3f7, #0d47a1);
  }
  #app #card-wrapper.blue #card #card-right #card-right-contents #coin-header #coin-symbol h1 {
    color: #4fc3f7;
  }
  #app #card-wrapper.blue #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    color: #4fc3f7;
  }
  #app #card-wrapper.blue #card #card-right #card-right-contents #card-right-stripes:before, #app #card-wrapper.blue #card #card-right #card-right-contents #card-right-stripes:after {
    background-color: #4fc3f7;
  }
  #app #card-wrapper.green #card #card-left {
    background-image: linear-gradient(45deg, #66bb6a, #cddc39);
  }
  #app #card-wrapper.green #card #card-right #card-right-contents #coin-header #coin-symbol h1 {
    color: #66bb6a;
  }
  #app #card-wrapper.green #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    color: #66bb6a;
  }
  #app #card-wrapper.green #card #card-right #card-right-contents #card-right-stripes:before, #app #card-wrapper.green #card #card-right #card-right-contents #card-right-stripes:after {
    background-color: #66bb6a;
  }
  #app #card-wrapper.gray #card #card-left {
    background-image: linear-gradient(45deg, #3c3c3c, #969696);
  }
  #app #card-wrapper.gray #card #card-right #card-right-contents #coin-header #coin-symbol h1 {
    color: #969696;
  }
  #app #card-wrapper.gray #card #card-right #card-right-contents #coin-header #coin-rank .value h1 {
    color: #3c3c3c;
  }
  #app #card-wrapper.gray #card #card-right #card-right-contents #card-right-stripes:before, #app #card-wrapper.gray #card #card-right #card-right-contents #card-right-stripes:after {
    background-color: #3c3c3c;
  }

  @keyframes rotate {
    0% {
      transform: translateX(-50%) translateY(-50%) rotate(0deg);
    }
    100% {
      transform: translateX(-50%) translateY(-50%) rotate(360deg);
    }
  }
  @keyframes rotate-reverse {
    0% {
      transform: translateX(-50%) translateY(-50%) rotate(0deg);
    }
    100% {
      transform: translateX(-50%) translateY(-50%) rotate(-360deg);
    }
  }
  @keyframes bounce-tooltip {
    0%, 55%, 65%, 75%, 100% {
      margin-left: 5px;
    }
    60%, 70% {
      margin-left: 10px;
    }
  }
  @keyframes fade-in-up {
    from, 60%, 75%, 90%, to {
      animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    from {
      opacity: 0;
      transform: translate3d(-50%, -40%, 0);
    }
    to {
      transform: translate3d(-50%, -50%, 0);
    }
  }
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div id="root"></div>
<!-- partial -->
  <script src='https://codepen.io/TheVVaFFle/pen/0299c8b36352c72cbfe8df48b47b54ca.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/16.2.0/umd/react.development.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.2.0/umd/react-dom.development.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.js'></script>
<script src='https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>
<script type="text/javascript">
const ORANGE = 'ORANGE',
BLUE = 'BLUE',
GREEN = 'GREEN',
GRAY = 'GRAY';

const getCoinIcon = symbol => {
  return `https://s3-us-west-2.amazonaws.com/s.cdpn.io/1468070/${symbol.toLowerCase()}.svg`;
};

const getCoinColor = symbol => {
  switch (symbol) {
    case 'ETH':
    case 'XRP':
    case 'ADA':
    case 'XLM':
    case 'XEM':
    case 'LSK':
    case 'DASH':
      return BLUE;
    case 'BCH':
    case 'USDT':
    case 'NEO':
      return GREEN;
    case 'BTC':
    case 'XMR':
      return ORANGE;
    case 'TRX':
    case 'EOS':
    case 'LTC':
    default:
      return GRAY;}

};

const data = [
{
  id: 1,
  name: "Bitcoin",
  symbol: "BTC",
  rank: 1,
  price: "<?php echo $data['bitcoin_fiyat']; ?>",
  change24hr: "<?php echo $data['bitcoin_saatlik_deger']; ?>",
  cap: "<?php echo $data['bitcoin_tl']; ?>",
  volume: "<?php echo $data['bitcoin_hacim']; ?>",
  circulating: "<?php echo $data['bitcoin_gunluk_aralik']; ?>",
  img: getCoinIcon("BTC"),
  color: getCoinColor("BTC") },

{
  id: 2,
  name: "Ethereum",
  symbol: "ETH",
  rank: 2,
  price: "<?php echo $data['ethereum_fiyat']; ?>",
  change24hr: "<?php echo $data['ethereum_saatlik_deger']; ?>",
  cap: "<?php echo $data['ethereum_tl']; ?>",
  volume: "<?php echo $data['ethereum_hacim']; ?>",
  circulating: "<?php echo $data['ethereum_gunluk_aralik']; ?>",
  img: getCoinIcon("ETH"),
  color: getCoinColor("ETH") },

{
  id: 3,
  name: "Tether",
  symbol: "USDT",
  rank: 3,
  price: "1.00",
  price: "<?php echo $data['tether_fiyat']; ?>",
  change24hr: "<?php echo $data['tether_saatlik_deger']; ?>",
  cap: "<?php echo $data['tether_tl']; ?>",
  volume: "<?php echo $data['tether_hacim']; ?>",
  circulating: "<?php echo $data['tether_gunluk_aralik']; ?>",
  img: getCoinIcon("USDT"),
  color: getCoinColor("USDT") }];



class App extends React.Component {
  constructor(props) {
    super(props);
    this.getCoins = this.getCoins.bind(this);
    this.setIndex = this.setIndex.bind(this);
    this.state = {
      coins: [],
      index: 0,
      updating: false,
      isLoading: false,
      isShowingTooltip: true };

  }
  componentDidMount() {
    this.getCoins();
    particlesJS("particles", particlesConfig);
  }
  componentDidUpdate(prevProps, prevState) {
    if (prevState.index !== this.state.index) {
      if (this.state.isShowingTooltip) {
        this.setState({ isShowingTooltip: false });
      }
      this.setState({ updating: true });
      setTimeout(() => {
        this.setState({ updating: false });
      }, 200);
    }
  }
  getCoins() {
    this.setState({ isLoading: true });

    setTimeout(() => {
      this.setState({ coins: data });
      this.setState({ isLoading: false });
    }, 1000);
  }
  mapCoins(coins) {
    return coins.map(coin => ({
      name: coin.name,
      symbol: coin.symbol,
      rank: coin.rank,
      price: formatNum(coin.price_usd),
      change24hr: coin.percent_change_24h,
      cap: formatNum(coin.market_cap_usd),
      volume: formatNum(coin['24h_volume_usd']),
      circulating: formatNum(coin.available_supply),
      img: this.getCoinIcon(coin.symbol.toLowerCase()),
      color: getCoinColor(coin.symbol) }));

  }
  setIndex(index) {
    this.setState({ index });
  }
  render() {
    const {
      coins,
      index,
      updating,
      isLoading,
      isShowingTooltip } =
    this.state;
    let card = null;
    if (isLoading) {
      card = /*#__PURE__*/
      React.createElement("div", { id: "card-loading" }, /*#__PURE__*/
      React.createElement("div", { id: "card-loading-spinner" }));


    } else
    if (coins.length > 0) {
      card = /*#__PURE__*/
      React.createElement(Card, {
        coins: coins,
        index: index,
        setIndex: this.setIndex });


    }

    return /*#__PURE__*/(
      React.createElement("div", { id: "app", className: updating ? 'updating' : '' }, /*#__PURE__*/
      React.createElement("div", { id: "particles" }), /*#__PURE__*/
      React.createElement("div", { id: "help-tooltip", className: isShowingTooltip ? 'showing' : 'hide' }, /*#__PURE__*/
      React.createElement("i", { className: "fa fa-question-circle-o" }), /*#__PURE__*/
      React.createElement("h1", null, /*#__PURE__*/React.createElement("span", { className: "text" }, "Bu uygulama Umut Can Arda tarafından yapılmıştır."), /*#__PURE__*/React.createElement("span", { className: "triangle" }))),

      card));


  }}


class Card extends React.Component {
  determineSign(num) {
    return parseFloat(num) >= 0 ? 'positive' : 'negative';
  }
  render() {
    const { coins, index } = this.props,
    coin = coins[index],
    colorClass = getColorClass(coin.color);
    return /*#__PURE__*/(
      React.createElement("div", { id: "card-wrapper", className: colorClass }, /*#__PURE__*/
      React.createElement("div", { id: "card" }, /*#__PURE__*/
      React.createElement("div", { id: "card-left", className: "card-half" }, /*#__PURE__*/
      React.createElement("div", { id: "coin-icon", style: { backgroundImage: `url(${coin.img})` } }), /*#__PURE__*/
      React.createElement("div", { id: "coin-symbol-vert" }, /*#__PURE__*/
      React.createElement("h1", null, coin.symbol)), /*#__PURE__*/

      React.createElement(CoinSelection, {
        coins: coins,
        index: index,
        setIndex: this.props.setIndex })), /*#__PURE__*/


      React.createElement("div", { id: "card-right", className: "card-half" }, /*#__PURE__*/
      React.createElement("div", { id: "card-right-contents" }, /*#__PURE__*/
      React.createElement("div", { id: "coin-header" }, /*#__PURE__*/
      React.createElement("div", { id: "coin-name" }, /*#__PURE__*/
      React.createElement("h1", null, coin.name)), /*#__PURE__*/

      React.createElement("div", { id: "coin-symbol" }, /*#__PURE__*/
      React.createElement("h1", null, coin.symbol)), /*#__PURE__*/

      React.createElement("div", { id: "coin-rank" }, /*#__PURE__*/
      React.createElement("div", { className: "label" }, /*#__PURE__*/
      React.createElement("h1", null, "Rank")), /*#__PURE__*/

      React.createElement("div", { className: "value" }, /*#__PURE__*/
      React.createElement("h1", null, coin.rank)))), /*#__PURE__*/



      React.createElement("div", { id: "coin-price" }, /*#__PURE__*/
      React.createElement("div", { className: "value" }, /*#__PURE__*/
      React.createElement("h1", null, "", coin.price)), /*#__PURE__*/

      React.createElement("div", { id: "coin-change-24hr", className: this.determineSign(coin.change24hr) }, /*#__PURE__*/
      React.createElement("h1", null, coin.change24hr, "%"))), /*#__PURE__*/


      React.createElement("div", { id: "coin-info" }, /*#__PURE__*/
      React.createElement(CoinInfoField, { value: `${coin.cap}`, label: "Türk Lirası Değeri" }), /*#__PURE__*/
      React.createElement(CoinInfoField, { value: `${coin.volume}`, label: "Hacim" }), /*#__PURE__*/
      React.createElement(CoinInfoField, { value: `${coin.circulating} ${coin.symbol}`, label: "Günlük Aralık" })), /*#__PURE__*/

      React.createElement("div", { id: "card-right-stripes" }))))));





  }}


const CoinInfoField = ({
  value,
  label }) =>
{
  return /*#__PURE__*/(
    React.createElement("div", { className: "coin-info-field" }, /*#__PURE__*/
    React.createElement("div", { className: "value" }, /*#__PURE__*/
    React.createElement("h1", null, value)), /*#__PURE__*/

    React.createElement("div", { className: "label" }, /*#__PURE__*/
    React.createElement("h1", null, label))));



};

class CoinSelection extends React.Component {
  constructor(props) {
    super(props);
    this.setCurrentScrollTop = this.setCurrentScrollTop.bind(this);
    this.moveScrollTop = this.moveScrollTop.bind(this);
    this.onOptionsScroll = this.onOptionsScroll.bind(this);
    this.state = {
      currentScrollTop: 0 };

  }
  setCurrentScrollTop(val) {
    this.setState({ currentScrollTop: val });
  }
  moveScrollTop() {
    this.refs.coinOptions.scrollTop = this.state.currentScrollTop;
  }
  onOptionsScroll() {
    const option = document.getElementsByClassName('coin-option')[0],
    topOffset = window.innerHeight / 2,
    optionHeight = option.clientHeight,
    scrollTop = this.refs.coinOptions.scrollTop,
    newScrollTop = this.props.index * (optionHeight + 20),
    index = Math.max(1, Math.ceil(scrollTop / optionHeight));
    this.setCurrentScrollTop(newScrollTop);
    this.props.setIndex(index - 1);
  }
  render() {
    const coinOptions = this.props.coins.slice(0, 10).map(coin => {
      const selected = this.props.index == coin.rank - 1;
      return /*#__PURE__*/(
        React.createElement("div", { key: coin.symbol, className: `coin-option ${selected ? 'selected' : ''}` }, /*#__PURE__*/
        React.createElement("div", { className: 'coin-option-icon', style: { backgroundImage: `url(${coin.img})` } })));


    });
    return /*#__PURE__*/(
      React.createElement("div", { id: "coin-selection", onMouseLeave: this.moveScrollTop }, /*#__PURE__*/
      React.createElement("div", { id: "coin-options-wrapper",
        ref: "coinOptions",
        className: "scroll-bar",
        onScroll: _.throttle(this.onOptionsScroll, 200) }, /*#__PURE__*/

      React.createElement("div", { id: "coin-options" },
      coinOptions))));




  }}


const formatNum = num => {
  const splitNum = num.split('.'),
  firstHalf = splitNum[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","),
  secondHalf = splitNum[1] ? splitNum[1].substring(0, 2) : splitNum[1];

  return secondHalf ? `${firstHalf}.${secondHalf}` : firstHalf;
};

const getColorClass = color => {
  switch (color) {
    case ORANGE:
      return 'orange';
    case BLUE:
      return 'blue';
    case GREEN:
      return 'green';
    case GRAY:
      return 'gray';}

};

const particlesConfig = {
  "particles": {
    "number": {
      "value": 30 },

    "color": {
      "value": "#607d8b" },

    "size": {
      "value": 2 },

    "line_linked": {
      "enable": true,
      "distance": 350,
      "color": "#607d8b" } },


  "interactivity": {
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab" },

      "onclick": {
        "enable": false } },


    "modes": {
      "grab": {
        "distance": 500,
        "line_linked": {
          "opacity": 1 } } } } };






ReactDOM.render( /*#__PURE__*/React.createElement(App, null), document.getElementById('root'));
</script>

</body>
</html>
