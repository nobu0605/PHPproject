import Head from 'next/head'

export default class HeadTag extends React.Component {
  render() {
    return (
      <Head>
        <link rel="stylesheet" type="text/css" href="static/css/main.css" />
        <title key="title">NextProject</title>
      </Head>
    )
  }
}
