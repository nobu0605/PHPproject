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
import Footer from '../components/Footer.js'
import ModalWindow from '../components/modal.js'

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

const reduxDetail = `Centralized Centralizing your application's state and logic enables powerful capabilities like undo/redo, state persistence, and much more.Debuggable.The Redux DevTools make it easy to trace when, where, why, and how your application's state changed. Redux's architecture lets you log changes, use "time-travel debugging", and even send complete error reports to a server.`
const reactNativeDetail = `Centralized Centralizing your application's state and logic enables powerful capabilities like undo/redo, state persistence, and much more.Debuggable.The Redux DevTools make it easy to trace when, where, why, and how your application's state changed. Redux's architecture lets you log changes, use "time-travel debugging", and even send complete error reports to a server.`
const electronDetail = `Centralized Centralizing your application's state and logic enables powerful capabilities like undo/redo, state persistence, and much more.Debuggable.The Redux DevTools make it easy to trace when, where, why, and how your application's state changed. Redux's architecture lets you log changes, use "time-travel debugging", and even send complete error reports to a server.`

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
            background: '#2E2E2E'
          }}
        >
          <div
            style={{
              height: 90
            }}
          >
            <h1
              style={{
                color: 'white',
                paddingTop: 40,
                textAlign: 'center',
                fontSize: 45
              }}
            >
              Related
            </h1>
          </div>
          <div
            style={{
              display: 'flex',
              justifyContent: 'center',
              marginTop: 50
            }}
          >
            <div
              style={{
                height: 650,
                width: '30%',
                marginRight: 40,
                marginLeft: 40
              }}
            >
              {' '}
              <div
                style={{
                  height: 480,
                  width: '83%',
                  display: 'flex',
                  flexDirection: 'column',
                  padding: 40,
                  background: 'white',
                  borderRadius: 30
                }}
              >
                <div style={{ display: 'flex', justifyContent: 'center' }}>
                  <h1
                    style={{
                      paddingBottom: 20,
                      paddingTop: 20,
                      color: 'black'
                    }}
                  >
                    Redux
                  </h1>
                </div>
                <div
                  style={{
                    display: 'flex',
                    flexDirection: 'column'
                  }}
                >
                  <div
                    style={{
                      display: 'flex',
                      justifyContent: 'center'
                    }}
                  >
                    <img
                      style={{
                        height: '50%',
                        width: '70%'
                      }}
                      src="static/img/logo.png"
                    />
                  </div>
                  <div
                    style={{
                      display: 'flex',
                      justifyContent: 'center'
                    }}
                  >
                    <p style={{ marginLeft: 20, marginTop: 40 }}>
                      Redux helps you write applications that behave
                      consistently, run in different environments (client,
                      server, and native), and are easy to test.
                    </p>
                  </div>
                  <ModalWindow description={reduxDetail} />
                </div>
              </div>
            </div>

            <div
              style={{
                height: 650,
                width: '30%',
                marginRight: 40
              }}
            >
              {' '}
              <div
                style={{
                  height: 480,
                  width: '83%',
                  display: 'flex',
                  flexDirection: 'column',
                  padding: 40,
                  background: 'white',
                  borderRadius: 30
                }}
              >
                <div style={{ display: 'flex', justifyContent: 'center' }}>
                  <h1
                    style={{
                      paddingBottom: 20,
                      paddingTop: 20,
                      color: 'black'
                    }}
                  >
                    React Native
                  </h1>
                </div>
                <div
                  style={{
                    display: 'flex',
                    flexDirection: 'column'
                  }}
                >
                  <div
                    style={{
                      display: 'flex',
                      justifyContent: 'center'
                    }}
                  >
                    <img
                      style={{
                        height: '50%',
                        width: '70%'
                      }}
                      src="static/img/download_react_native_1115506.png"
                    />
                  </div>
                  <div
                    style={{
                      display: 'flex',
                      justifyContent: 'center'
                    }}
                  >
                    <p style={{ marginLeft: 20 }}>
                      Native lets you build mobile apps using only JavaScript.
                      It uses the same design as React, letting you compose a
                      rich mobile UI from declarative components.
                    </p>
                  </div>
                  <ModalWindow description={reactNativeDetail} />
                </div>
              </div>
            </div>

            <div
              style={{
                height: 650,
                width: '30%',
                marginRight: 40
              }}
            >
              {' '}
              <div
                style={{
                  height: 480,
                  width: '83%',
                  display: 'flex',
                  flexDirection: 'column',
                  padding: 40,
                  background: 'white',
                  borderRadius: 30
                }}
              >
                <div style={{ display: 'flex', justifyContent: 'center' }}>
                  <h1
                    style={{
                      paddingBottom: 20,
                      paddingTop: 20,
                      color: 'black'
                    }}
                  >
                    Electron
                  </h1>
                </div>
                <div
                  style={{
                    display: 'flex',
                    flexDirection: 'column'
                  }}
                >
                  <div
                    style={{
                      display: 'flex',
                      justifyContent: 'center'
                    }}
                  >
                    <img
                      style={{
                        height: '50%',
                        width: '70%'
                      }}
                      src="static/img/68747470733a2f2f63646e2e7261776769742e636f6d2f566164656c6975732f456c656374726f6e2e4e65742e5675652f30376166353838332f656c656374726f6e2e6e65742d6c6f676f2e706e67.png"
                    />
                  </div>
                  <div
                    style={{
                      display: 'flex',
                      justifyContent: 'center'
                    }}
                  >
                    <p style={{ marginLeft: 20 }}>
                      If you can build a website, you can build a desktop app.
                      Electron is a framework for creating native applications.
                    </p>
                  </div>
                  <ModalWindow description={electronDetail} />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          style={{
            display: 'flex',
            justifyContent: 'center',
            backgroundImage:
              "url('static/img/https___www.pakutaso.com_shared_img_thumb_MIYADSC_3425-3.jpg')",
            backgroundSize: '100% 100%'
          }}
        >
          <div
            style={{
              width: '32%',
              background: 'rgba(65,105, 225,0.3)',
              lineHeight: 2,
              padding: 50,
              color: '#d3d3d3'
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
          <div
            style={{
              height: 600,
              width: '36%'
            }}
          />
          <div
            style={{
              width: '32%',
              background: 'rgba(65,105, 225,0.3)',
              lineHeight: 2,
              padding: 50,
              color: '#d3d3d3'
            }}
          >
            <h1>What's React</h1>
            <p>
              Declarative React makes it painless to create interactive UIs.
              Design simple views for each state in your application, and React
              will efficiently update and render just the right components when
              your data changes. Declarative views make your code more
              predictable and easier to debug.
            </p>
          </div>
        </div>

        <div
          style={{
            height: 400,
            background: '#2E2E2E'
          }}
        >
          <h1 style={{ color: 'white', padding: 20 }}>Place</h1>
          <MyMapComponent
            isMarkerShown
            lat={37.3874}
            lng={-122.0575}
            googleMapURL="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry,drawing,places&key=AIzaSyBzo2Me32_0ofJ4A3dB8RqO0SLh9zxvk_o"
            loadingElement={<div style={{ height: '100%' }} />}
            containerElement={<div style={{ height: '420px' }} />}
            mapElement={<div style={{ height: '100%' }} />}
          />
        </div>

        <Footer />
      </div>
    )
  }
}
