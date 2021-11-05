import * as React from 'react';
import { WebView } from 'react-native-webview';
import { StyleSheet } from 'react-native';
import Constants from 'expo-constants';

// Loading Website to the App
export default function App() {
  return (
    <WebView 
      style={styles.container}
      source={{ uri: 'https://s328390.brambling.cdu.edu.au/HIT238/index.php' }}
    />
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: Constants.statusBarHeight,
  },
}); 
