import React from 'react'
import Slider from 'react-slick'
import styled from 'styled-components'
import Head from 'next/head'

export default class Index extends React.Component {
  render() {
    const settings = {
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      autoplay: true,
      adaptiveHeight: true,
      centerMode: true,
      fade: true,
      responsive: [
        {
          breakpoint: 2240,
          settings: { centerPadding: '0', slidesToShow: 3 }
        }
      ]
    }

    return (
      <div>
        <Head>
          <link rel="stylesheet" type="text/css" href="static/css/slider.css" />
          <title key="title">Next</title>
        </Head>
        <Title>slide</Title>
        <div
          style={{
            height: 500,
            margin: '0 auto',
            padding: 40,
            color: '#333',
            background: '#419be0',
            maxWidth: 960
          }}
          className="container"
        >
          <Slider {...settings}>
            <Image image={'http://placekitten.com/g/400/200'} />
            <Image image={'http://placekitten.com/g/400/200'} />
            <Image image={'http://placekitten.com/g/400/200'} />
          </Slider>
        </div>
      </div>
    )
  }
}

const Title = styled.h1`
  font-size: 1.5em;
  text-align: center;
  color: palevioletred;
`
const Image = styled.div`
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50% 50%;
  height: 300px;
  background-image: url(${props => props.image});
  margin: 0 auto;
`
