import React from 'react'
import styled from 'styled-components'
import Head from '../components/Head.js'
import Header from '../components/Header.js'
import FadeInText from '../components/FadeInText.js'
import FadeInLogo from '../components/FadeInLogo.js'
import {
  withScriptjs,
  withGoogleMap,
  GoogleMap,
  Marker
} from 'react-google-maps'

const MyMapComponent = withScriptjs(
  withGoogleMap(props => (
    <GoogleMap
      defaultZoom={18}
      defaultCenter={{ lat: props.lat, lng: props.lng }}
    >
      {props.isMarkerShown && (
        <Marker position={{ lat: props.lat, lng: props.lng }} />
      )}
    </GoogleMap>
  ))
)

export default class Index extends React.Component {
  render() {
    return (
      <div>
        <Head />
        <Header />
        <div
          style={{
            width: '100%',
            height: 770,
            backgroundImage:
              "url('static/img/https___www.pakutaso.com_shared_img_thumb_kumakichi0221008.jpg')",
            backgroundSize: '100% 100%'
          }}
        >
          <div
            style={{
              width: '100%',
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'center',
              paddingTop: 200
            }}
          >
            <FadeInText />
          </div>
          <div
            style={{
              width: '100%',
              display: 'flex',
              justifyContent: 'center'
            }}
          >
            <FadeInLogo />
          </div>
        </div>
        <div
          style={{
            display: 'flex',
            justifyContent: 'center'
          }}
        >
          <div style={{ width: '33%', background: 'rgba(65,105, 225,0.8)' }} />
          <div
            style={{
              height: 300,
              float: 'center',
              width: '34%',
              lineHeight: 2,
              padding: 50
            }}
          >
            <h1>What's Next.js</h1>
            <p>
              IT’S A FRAMEWORK Next.js is opinionated and provides structure for
              how you build your app. Like Rails, the file-system is often the
              API. You name your file something special and put it in a special
              directory, and it Just Works. In this way, Next.js feels like a
              framework.
            </p>
          </div>
          <div style={{ width: '33%', background: 'rgba(65,105, 225,0.8)' }} />
        </div>
        <MyMapComponent
          isMarkerShown
          lat={37.77493}
          lng={-122.419416}
          googleMapURL="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry,drawing,places&key=AIzaSyBzo2Me32"
          loadingElement={<div style={{ height: '100%' }} />}
          containerElement={<div style={{ height: '320px' }} />}
          mapElement={<div style={{ height: '100%' }} />}
        />
      </div>
    )
  }
}
