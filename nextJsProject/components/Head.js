import Head from 'next/head'

export default class HeadTag extends React.Component {
  render() {
    return (
      <Head>
        <link rel="stylesheet" type="text/css" href="static/css/main.css" />
        <link rel="SHORTCUT ICON" href="static/img/react-1-768x768.jpg" />
        <title key="title">NextProject</title>
      </Head>
    )
  }
}
